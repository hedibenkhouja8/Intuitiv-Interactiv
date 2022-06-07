import 'dart:io';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:http/http.dart' as http;
import 'package:project/Admin/demandeemprunt.dart';

import 'package:project/widget/navigation_drawer_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:syncfusion_flutter_pdfviewer/pdfviewer.dart';

import '../widget/navigation_draweradmin_widget.dart';

class Demandedetails extends StatefulWidget {
  final String id;
  const Demandedetails({
    Key? key,
    required this.id,
  }) : super(key: key);

  @override
  _DemandedetailsState createState() => _DemandedetailsState(id);
}

class _DemandedetailsState extends State<Demandedetails> {
  dynamic data = [];
  String id;
  _DemandedetailsState(this.id);
  bool _isShown = true;
  void getMemoire() async {
    Response response = await get(
        Uri.parse("http://127.0.0.1:8000/api/DemandeEmpruntDetails/${id}"));
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
        drawer: NavigationDraweradminWidget(),
        appBar: AppBar(
          shape: const RoundedRectangleBorder(
            borderRadius: BorderRadius.vertical(
              bottom: Radius.circular(30),
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
                return Container(
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
                                    data[index]['memoire']['demande_depot']
                                        ['coverimage'],
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
                                  "Titre :\n" +
                                      data[index]['memoire']['demande_depot']
                                          ['titre'],
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
                                  "Etudiant :\n" + data[index]['user']['name'],
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
                                  "Dates :\n" +
                                      "Date Debut :" +
                                      data[index]['date_debut'] +
                                      "\n" +
                                      "Date fin :" +
                                      data[index]['date_fin'],
                                  style: TextStyle(
                                    fontWeight: FontWeight.bold,
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
                                  "Description :\n" +
                                      data[index]['description'],
                                  style: TextStyle(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 14,
                                  ),
                                ),
                              ),
                            ),
                            Container(
                              width: MediaQuery.of(context).size.width * 0.5,
                              child: Padding(
                                padding: const EdgeInsets.fromLTRB(5, 10, 0, 0),
                                child: Text(
                                  "Status :\n" + data[index]['status'],
                                  style: TextStyle(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 14,
                                  ),
                                ),
                              ),
                            ),
                            Container(
                              width: MediaQuery.of(context).size.width * 0.5,
                              child: Padding(
                                  padding:
                                      const EdgeInsets.fromLTRB(5, 10, 0, 0),
                                  child: Column(children: <Widget>[
                                    Row(
                                        mainAxisAlignment:
                                            MainAxisAlignment.center,
                                        crossAxisAlignment:
                                            CrossAxisAlignment.center,
                                        children: [
                                          const Padding(
                                            padding:
                                                EdgeInsets.fromLTRB(0, 5, 0, 0),
                                          ),
                                          FlatButton(
                                              padding:
                                                  const EdgeInsets.fromLTRB(
                                                      0, 5, 40, 0),
                                              child: const Text(
                                                'Accepter',
                                                style: TextStyle(
                                                    fontSize: 17,
                                                    color: Color.fromARGB(
                                                        218, 58, 218, 43),
                                                    fontWeight:
                                                        FontWeight.bold),
                                              ),
                                              onPressed: () {
                                                accepter(context);
                                              }),
                                          FlatButton(
                                              padding:
                                                  const EdgeInsets.fromLTRB(
                                                      0, 5, 40, 0),
                                              child: const Text(
                                                'Refuser',
                                                style: TextStyle(
                                                    fontSize: 17,
                                                    color: Color.fromARGB(
                                                        218, 218, 43, 43),
                                                    fontWeight:
                                                        FontWeight.bold),
                                              ),
                                              onPressed: () {
                                                refuser();
                                              })
                                        ]),
                                  ])),
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
                );
              },
              separatorBuilder: (context, index) {
                return Divider();
              }),
        )));
  }

  void accepter(BuildContext context) {
    Widget cancelButton = FlatButton(
      child: Text("annuler"),
      onPressed: () {
        Navigator.pop(context);
      },
    );
    Widget continueButton = FlatButton(
      child: Text("confirmer"),
      onPressed: () {
        var uri =
            Uri.parse("http://127.0.0.1:8000/api/DemandeEmpruntaccept/${id}");
        var request = http.post(uri);
        var snackBar3 = const SnackBar(
          content: Text('la demande est accepté  !'),
        );
        ScaffoldMessenger.of(context).showSnackBar(snackBar3);
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Demandeempruntpage()),
        );
      },
    );
    // set up the AlertDialog
    AlertDialog alert = AlertDialog(
      title: Text("Are you sure ?"),
      content: Text("accepter cette demande ?"),
      actions: [
        cancelButton,
        continueButton,
      ],
    );
    // show the dialog
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return alert;
      },
    );
  }

  void refuser() {
    Widget cancelButton = FlatButton(
      child: Text("annuler"),
      onPressed: () {
        Navigator.pop(context);
      },
    );
    Widget continueButton = FlatButton(
      child: Text("confirmer"),
      onPressed: () {
        var uri =
            Uri.parse("http://127.0.0.1:8000/api/DemandeEmpruntrefuse/${id}");
        var request = http.post(uri);
        var snackBar3 = const SnackBar(
          content: Text('la demande est refusée  !'),
        );
        ScaffoldMessenger.of(context).showSnackBar(snackBar3);
        Navigator.push(
          context,
          MaterialPageRoute(builder: (context) => const Demandeempruntpage()),
        );
      },
    );
    // set up the AlertDialog
    AlertDialog alert = AlertDialog(
      title: Text("Are you sure ?"),
      content: Text("refuser cette demande ?"),
      actions: [
        cancelButton,
        continueButton,
      ],
    );
    // show the dialog
    showDialog(
      context: context,
      builder: (BuildContext context) {
        return alert;
      },
    );
  }
}
