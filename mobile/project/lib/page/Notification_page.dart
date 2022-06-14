import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:project/page/mesdemandes.dart';
import 'package:project/page/mesmemoires_page.dart';
import 'package:project/page/notificationTiles.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

class NotificationPage extends StatefulWidget {
  const NotificationPage({Key? key}) : super(key: key);

  @override
  _NotificationPageState createState() => _NotificationPageState();
}

class _NotificationPageState extends State<NotificationPage> {
  dynamic data = [];

  void getMemoire() async {
    var id;
    final SharedPreferences userdata = await SharedPreferences.getInstance();
    var idd = userdata.getString("id");

    setState(() {
      id = idd;
    });
    Response response = await get(
        Uri.parse("http://127.0.0.1:8000/api/Notificationnotviewedlist/${id}"));
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
              'Mes Notifications',
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
          width: 900,
          child: ListView.separated(
              physics: ClampingScrollPhysics(),
              itemCount: data.length,
              itemBuilder: (context, index) {
                return  GestureDetector(
                    onTap: () => {
                          redirect()
                        },
                        child:NotificationTiles(
                  title: data[index]['titre'],
                  subtitle: data[index]['content'],
                  enable: true,
                  date: data[index]['created_at'],
                ));
              },
              separatorBuilder: (context, index) {
                return Divider();
              }),
        )));
  }
    redirect() {
   
       Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) =>
                                const MesMemoirespage()),
                      );
    
  }
}
