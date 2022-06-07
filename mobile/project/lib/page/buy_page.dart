import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

class BuyPage extends StatefulWidget {
  const BuyPage({Key? key}) : super(key: key);
  @override
  _BuyPageState createState() => _BuyPageState();
}

class _BuyPageState extends State<BuyPage> {
  dynamic data = [];
  void getMemoire() async {
    Response response =
        await get(Uri.parse("http://127.0.0.1:8000/api/Memoiremobile"));
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
  Widget build(BuildContext context) => Scaffold(
      //drawer: NavigationDrawerWidget(),
      //drawer: NavigationDrawerWidget(),
      drawer: NavigationDrawerWidget(),
      appBar: AppBar(
        shape: const RoundedRectangleBorder(
          borderRadius: BorderRadius.vertical(
            bottom: Radius.circular(30),
          ),
        ),
        title: const Center(
          child: Text(
            'Welcome to our app',
            textAlign: TextAlign.right,
            style: TextStyle(color: Colors.white60, fontSize: 15),
          ),
        ),
        backgroundColor: const Color.fromRGBO(212, 202, 104, 1),
      ),
      body: buysList());

  Widget buysList() {
    return ListView.builder(
        itemCount: data.length,
        itemBuilder: (BuildContext context, index) {
          return Container(
            height: 500,
            width: 100,
            margin: const EdgeInsets.all(2.0),
            child:
                Column(mainAxisAlignment: MainAxisAlignment.start, children: [
              Card(
                clipBehavior: Clip.antiAlias,
                child: Column(
                  children: [
                    ListTile(
                      title: Text("Titre :" + data[index]['titre']),
                      subtitle: Text(
                        "Nombre des pages :" + '${data[index]['nbpages']}',
                        style: TextStyle(color: Colors.black.withOpacity(0.6)),
                      ),
                    ),
                    Padding(
                      padding: const EdgeInsets.all(16.0),
                      child: Text(
                        "Description :" + data[index]['description'],
                        style: TextStyle(color: Colors.black.withOpacity(0.6)),
                      ),
                    ),
                    Image.network(
                      "http://127.0.0.1:8000/storage/files/demandes/cover/" +
                          data[index]['coverimage'],
                      width: 300,
                      height: 300,
                    )
                  ],
                ),
              ),
            ]),
          );
        });
  }
}
