import 'package:flutter/material.dart';
import 'package:project/widget/appbar_widget.dart';
import 'package:project/widget/button_widget.dart';
import 'package:project/widget/numbers_widget.dart';
import 'package:project/widget/profile_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:http/http.dart' as http;

class ProfilePage extends StatefulWidget {
  const ProfilePage({Key? key}) : super(key: key);

  @override
  _ProfilePageState createState() => _ProfilePageState();
}

class _ProfilePageState extends State<ProfilePage> {
  var nom, prenom, image, email, tel, id, nb1 = 0, nb2 = 0, nb3, role;
  dynamic data = [];
  dynamic data2 = [];
  dynamic data3 = [];
  inituser() async {
    final SharedPreferences userdata = await SharedPreferences.getInstance();

    var idd = userdata.getString("id");
    var rr = userdata.getString("role");
    var a = userdata.getString("profilepic");
    String b = "http://127.0.0.1:8000/storage/files/register/profilepic/${a}";
    var name = userdata.getString("name");
    var pre = userdata.getString("prenom");
    var mail = userdata.getString("email");
    var tl = userdata.getString("tel");

    setState(() {
      image = b;
      id = idd;
      prenom = pre;
      nom = name;
      tel = tl;
      role = rr;
      email = mail;
    });
  }

  getuser() async {
    final SharedPreferences userdata = await SharedPreferences.getInstance();

    var idd = userdata.getString("id");

    Response response = await get(
        Uri.parse("http://127.0.0.1:8000/api/User/${idd}/DemandeEmprunt"));
    dynamic responsedata = jsonDecode(response.body);

    Response response3 =
        await get(Uri.parse("http://127.0.0.1:8000/api/AcceptedByUser/${idd}"));
    dynamic responsedata3 = jsonDecode(response3.body);

    setState(() {
      this.data = responsedata;
      this.data3 = responsedata3;
      this.nb1 = data.length;
      this.nb2 = data3.length;
    });
  }

  @override
  void initState() {
    super.initState();
    getuser();
    inituser();
  }

  @override
  Widget build(BuildContext context) {
    var fullname = "${nom} ${prenom}";

    return Scaffold(
      appBar: buildAppBar(context),
      body: ListView(
        physics: BouncingScrollPhysics(),
        children: [
          if (role == "admin") ...[
            ProfileWidget(
              imagePath: image,
              onClicked: () async {},
            ),
            const SizedBox(height: 34),
            buildName(fullname),
            const SizedBox(height: 24),
            const SizedBox(height: 38),
          ] else if (role == "etudiant") ...[
            ProfileWidget(
              imagePath: image,
              onClicked: () async {},
            ),
            const SizedBox(height: 34),
            buildName(fullname),
            const SizedBox(height: 24),
            NumbersWidget(nb1: "${nb1}", nb2: "${nb2}"),
            const SizedBox(height: 38),
          ]
        ],
      ),
    );
  }

  Widget buildName(nom) => Column(
        children: [
          Text(
            nom,
            style: TextStyle(fontWeight: FontWeight.bold, fontSize: 24),
          ),
          const SizedBox(height: 4),
          Text(
            email,
            style: TextStyle(color: Colors.grey),
          ),
          Text(
            tel,
            style: TextStyle(color: Colors.grey),
          ),
        ],
      );
}
