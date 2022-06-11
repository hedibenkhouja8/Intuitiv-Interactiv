import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:project/page/detailsmemoire.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

class HomePage extends StatefulWidget {
  const HomePage({Key? key}) : super(key: key);

  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  dynamic data = [];
  void getMemoire() async {
    Response response =
        await get(Uri.parse("http://127.0.0.1:8000/api/Memoire"));
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
            'Bienvenue sur notre application',
            textAlign: TextAlign.right,
            style: TextStyle(color: Colors.white, fontSize: 15),
          ),
        ),
        backgroundColor: Color.fromARGB(218, 43, 119, 218),
      ),
      body: buysList());

  Widget buysList() {
    return Center(
        child: Container(
      padding: EdgeInsets.all(18.0),
      alignment: Alignment.center,
      width: MediaQuery.of(context).size.width * 0.9,
      child: ListView.separated(
          physics: ClampingScrollPhysics(),
          itemCount: data.length,
          itemBuilder: (context, index) {
            return GestureDetector(
              onTap: () => {
                Navigator.push(
                  context,
                  MaterialPageRoute(
                      builder: (context) =>
                          Memoiredetails(id: '${data[index]['id']}')),
                )
              },
              child: Container(
                child: Card(
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(0.0),
                  ),
                  color: Colors.white70,
                  elevation: 10,
                  child: Wrap(
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.all(2.2),
                        child: ConstrainedBox(
                          constraints: BoxConstraints(
                            maxWidth: MediaQuery.of(context).size.width / 3.3,
                            maxHeight: MediaQuery.of(context).size.height,
                          ),
                          child: Image.network(
                              "http://127.0.0.1:8000/storage/files/demandes/cover/" +
                                  data[index]['demande_depot']['coverimage'],
                              fit: BoxFit.fill),
                        ),
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Container(
                            width: MediaQuery.of(context).size.width * 0.5,
                            child: Padding(
                              padding: const EdgeInsets.fromLTRB(5, 10, 0, 0),
                              child: Text(
                                data[index]['demande_depot']['titre'],
                                style: TextStyle(
                                  fontWeight: FontWeight.bold,
                                  fontSize: 18,
                                ),
                              ),
                            ),
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width * 0.5,
                            child: Padding(
                              padding: const EdgeInsets.fromLTRB(5, 10, 0, 0),
                              child: Text(
                                "Description :\n" +
                                    data[index]['demande_depot']['description'],
                                style: TextStyle(
                                  fontSize: 16,
                                ),
                              ),
                            ),
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width * 0.5,
                            child: Padding(
                              padding: const EdgeInsets.fromLTRB(5, 10, 0, 0),
                              child: Text(
                                "Nombre des pages :\n" +
                                    '${data[index]['demande_depot']['nbpages']}',
                                style: TextStyle(
                                  fontSize: 12,
                                ),
                              ),
                            ),
                          ),
                        ],
                      ),
                      //Column(
                      //children: <Widget>[
                      //Padding(
                      //padding: const EdgeInsets.fromLTRB(0, 0, 0, 30),
                      //child: Text(
                      //'${nbpages}',
                      //style: TextStyle(
                      // fontSize: 14,
                      //),
                      //),
                      //),
                      //],
                      //),
                    ],
                  ),
                ),
              ),
            );
          },
          separatorBuilder: (context, index) {
            return Divider();
          }),
    ));
  }
}
