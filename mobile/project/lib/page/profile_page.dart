import 'package:flutter/material.dart';
import 'package:project/widget/appbar_widget.dart';
import 'package:project/widget/button_widget.dart';
import 'package:project/widget/numbers_widget.dart';
import 'package:project/widget/profile_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ProfilePage extends StatefulWidget {
  const ProfilePage({Key? key}) : super(key: key);

  @override
  _ProfilePageState createState() => _ProfilePageState();
}

class _ProfilePageState extends State<ProfilePage> {
  var nom, prenom, image, email, tel, id;
  getuser() async {
    final SharedPreferences userdata = await SharedPreferences.getInstance();
    var a = userdata.getString("profilepic");
    String b = "http://127.0.0.1:8000/storage/files/register/profilepic/${a}";
    var idd = userdata.getString("id");
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
      email = mail;
    });
  }

  @override
  void initState() {
    super.initState();
    getuser();
  }

  @override
  Widget build(BuildContext context) {
    var fullname = "${nom} ${prenom}";
    return Scaffold(
      appBar: buildAppBar(context),
      body: ListView(
        physics: BouncingScrollPhysics(),
        children: [
          ProfileWidget(
            imagePath: image,
            onClicked: () async {},
          ),
          const SizedBox(height: 34),
          buildName(fullname),
          const SizedBox(height: 24),
          Center(child: buildUpgradeButton()),
          const SizedBox(height: 24),
          NumbersWidget(),
          const SizedBox(height: 38),
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

  Widget buildUpgradeButton() => ButtonWidget(
        text: 'Updade Profile',
        onClicked: () {},
      );
}
