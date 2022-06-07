import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:project/page/mesmemoirestiles.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

class MesMemoirespage extends StatefulWidget {
  const MesMemoirespage({Key? key}) : super(key: key);

  @override
  _MesMemoirespageState createState() => _MesMemoirespageState();
}

class _MesMemoirespageState extends State<MesMemoirespage> {
  dynamic data = [];

  void getMemoire() async {
    var id;
    final SharedPreferences userdata = await SharedPreferences.getInstance();
    var idd = userdata.getString("id");

    setState(() {
      id = idd;
    });
    Response response =
        await get(Uri.parse("http://127.0.0.1:8000/api/AcceptedByUser/${id}"));
    dynamic responsedata = jsonDecode(response.body);
    setState(() {
      this.data = responsedata;
    });
  }

  @override
  void initState() {
    getMemoire();
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
        resizeToAvoidBottomInset: false,
        backgroundColor: Colors.white,
        drawer: NavigationDrawerWidget(),
        appBar: AppBar(
          shape: const RoundedRectangleBorder(
            borderRadius: BorderRadius.vertical(
              bottom: Radius.circular(30),
            ),
          ),
          title: const Center(
            child: Text(
              'Mes Memoires empruntés',
              textAlign: TextAlign.right,
              style: TextStyle(color: Colors.white, fontSize: 15),
            ),
          ),
          backgroundColor: const Color.fromARGB(218, 43, 119, 218),
        ),
        body: Center(
            child: Container(
          padding: EdgeInsets.all(18.0),
          alignment: Alignment.center,
          width: MediaQuery.of(context).size.width * 0.9,
          child: ListView.separated(
              physics: ClampingScrollPhysics(),
              itemCount: data.length,
              itemBuilder: (context, index) {
                return MesmemoireTiles(
                  link:
                      "http://127.0.0.1:8000/storage/files/demandes/pdf/Memoire.pdf",
                  title: data[index]['memoire']['demande_depot']['titre'],
                  description: data[index]['memoire']['demande_depot']
                      ['description'],
                  nbpages: data[index]['memoire']['demande_depot']['nbpages'],
                  image: "http://127.0.0.1:8000/storage/files/demandes/cover/" +
                      data[index]['memoire']['demande_depot']['coverimage'],
                  enable: true,
                );
              },
              separatorBuilder: (context, index) {
                return Divider();
              }),
        )));
  }
}
