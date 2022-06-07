import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:project/Admin/demandedetails.dart';
import 'package:project/page/mesmemoirestiles.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

import '../widget/navigation_draweradmin_widget.dart';

class Demandeempruntpage extends StatefulWidget {
  const Demandeempruntpage({Key? key}) : super(key: key);

  @override
  _DemandeempruntState createState() => _DemandeempruntState();
}

class _DemandeempruntState extends State<Demandeempruntpage> {
  dynamic data = [];

  void getMemoire() async {
    var id;
    final SharedPreferences userdata = await SharedPreferences.getInstance();
    var idd = userdata.getString("id");

    setState(() {
      id = idd;
    });
    Response response =
        await get(Uri.parse("http://127.0.0.1:8000/api/demandeempenattente"));
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
      drawer: NavigationDraweradminWidget(),
      appBar: AppBar(
        shape: const RoundedRectangleBorder(
          borderRadius: BorderRadius.vertical(
            bottom: Radius.circular(30),
          ),
        ),
        title: const Center(
          child: Text(
            'Les demandes emprunts en attente ',
            textAlign: TextAlign.right,
            style: TextStyle(color: Colors.white, fontSize: 15),
          ),
        ),
        backgroundColor: const Color.fromARGB(218, 43, 119, 218),
      ),
      body: Center(
          child: Column(children: <Widget>[
        Container(
          margin: EdgeInsets.all(20),
          padding: EdgeInsets.all(18.0),
          alignment: Alignment.center,
          width: MediaQuery.of(context).size.width,
          child: Expanded(
            child: SingleChildScrollView(
              scrollDirection: Axis.horizontal,
              child: DataTable(
                columnSpacing: 38.0,
                columns: [
                  DataColumn(label: Expanded(child: Text('#'))),
                  DataColumn(label: Text('etudiant')),
                  DataColumn(label: Text('Memoire')),
                  DataColumn(
                      label: Expanded(
                          child: Text('Action', textAlign: TextAlign.center))),
                ],
                rows: List.generate(data.length, (index) {
                  return DataRow(cells: [
                    DataCell(Container(
                        child: Text("${index + 1}",
                            style: TextStyle(
                                fontSize: 17,
                                color: Color.fromARGB(218, 0, 0, 0),
                                fontWeight: FontWeight.bold)))),
                    DataCell(Container(
                        width: MediaQuery.of(context).size.width / 4,
                        child: Text(
                            "${data[index]['user']['name']} ${data[index]['user']['prenom']}"))),
                    DataCell(Container(
                        width: MediaQuery.of(context).size.width / 4,
                        child: Text(
                            "${data[index]['memoire']['demande_depot']['titre']}"))),
                    DataCell(
                      Container(
                        width: MediaQuery.of(context).size.width / 6,
                        child: ButtonTheme(
                          minWidth: 10.0,
                          height: 20.0,
                          child: RaisedButton(
                            color: const Color.fromARGB(218, 43, 119, 218),
                            textColor: Colors.white,
                            child: const Text("Details"),
                            padding: const EdgeInsets.fromLTRB(1, 1, 1, 1),
                            shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(50.0)),
                            onPressed: () {
                              Navigator.push(
                                context,
                                MaterialPageRoute(
                                  builder: (context) => Demandedetails(
                                      id: '${data[index]['id']}'),
                                ),
                              );
                            },
                          ),
                        ),
                      ),
                    ),
                  ]);
                }),
              ),
            ),
          ),
        ),
      ])),
    );
  }
}
