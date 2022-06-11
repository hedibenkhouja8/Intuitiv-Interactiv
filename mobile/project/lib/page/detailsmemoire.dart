import 'dart:io';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';
import 'package:flushbar/flushbar.dart';

import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:http/http.dart' as http;
import 'package:project/Admin/demandeemprunt.dart';
import 'package:intl/intl.dart';
import 'package:project/page/mesdemandes.dart';
import 'package:project/page/mesmemoires_page.dart';
import 'package:project/widget/navigation_drawer_widget.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:syncfusion_flutter_pdfviewer/pdfviewer.dart';

import '../widget/navigation_drawer_widget.dart';

class Memoiredetails extends StatefulWidget {
  final String id;
  const Memoiredetails({
    Key? key,
    required this.id,
  }) : super(key: key);

  @override
  _MemoiredetailsState createState() => _MemoiredetailsState(id);
}

class _MemoiredetailsState extends State<Memoiredetails> {
  dynamic data = [];
  String id;
  _MemoiredetailsState(this.id);
  bool _isShown = true;
  void getMemoire() async {
    Response response = await get(
        Uri.parse("http://127.0.0.1:8000/api/Memoire/${id}/DemandeDepot"));
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
        drawer: NavigationDrawerWidget(),
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
                                  "Titre :\n" +
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
                                  "Encadreur :\n" +
                                      data[index]['demande_depot']['encadreur']
                                          ['nom'],
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
                                  "Etablissement :\n" +
                                      "Date Debut :" +
                                      data[index]['demande_depot']
                                          ['etablisement']['nom'],
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
                                      data[index]['demande_depot']
                                          ['description'],
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
                                  "Domaine :\n" +
                                      data[index]['demande_depot']['domaine']
                                          ['nom'],
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
                                          RaisedButton(
                                              color: const Color.fromARGB(
                                                  218, 43, 119, 218),
                                              textColor: Colors.white,
                                              child: const Text(" Empruntez"),
                                              padding:
                                                  const EdgeInsets.fromLTRB(
                                                      120, 20, 120, 20),
                                              shape: RoundedRectangleBorder(
                                                  borderRadius:
                                                      BorderRadius.circular(
                                                          50.0)),
                                              onPressed: () {
                                                form(
                                                    context,
                                                    data[index]['demande_depot']
                                                        ['titre'],
                                                    data[index]['id']);
                                              }),
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

  void form(BuildContext context, String titrememoire, int id) {
    bool _isObscure = true;
    DateTime selectedDate = DateTime.now();
    final GlobalKey<FormState> _formKey = GlobalKey<FormState>();

    final TextEditingController titre = TextEditingController();
    final TextEditingController description = TextEditingController();
    final TextEditingController start_date = TextEditingController();
    final TextEditingController end_date = TextEditingController();
    titre.text = titrememoire;
    var v = 0;

    Future<void> _demandeemprunt() async {
      final SharedPreferences userdata = await SharedPreferences.getInstance();
      var userid = userdata.getString("id");
      var uri = Uri.parse("http://127.0.0.1:8000/api/DemandeEmprunt");
      var data = {
        "date_debut": start_date.text,
        "date_fin": end_date.text,
        "memoire_id": id,
        "user_id": userid,
        "description": description.text,
        "status": "EnAttente",
        "type": "indefini",
      };
      var request = http.post(uri,
          body: json.encode(data),
          headers: {"Content-Type": "application/json"});
      var response = await request.timeout(Duration(seconds: 10));
      if (response.statusCode == 200) {
        var snackBar2 = const SnackBar(
          content: Text('Demande ajouté ! '),
        );
        ScaffoldMessenger.of(context).showSnackBar(snackBar2);
        Navigator.push(
          context,
          MaterialPageRoute(
              builder: (context) => const MesDemandeempruntpage()),
        );
      } else {
        Flushbar(
          backgroundColor: Color.fromARGB(255, 235, 120, 85),
          message: "il ya un probleme ",
          duration: Duration(seconds: 4),
        ).show(context);
      }
    }

    Widget cancelButton = FlatButton(
      child: Text("annuler"),
      onPressed: () {
        Navigator.pop(context);
      },
    );
    Widget continueButton = RaisedButton(
        color: const Color.fromRGBO(45, 114, 178, 1),
        textColor: Colors.white,
        child: const Text("confirmer la demande"),
        padding: const EdgeInsets.fromLTRB(120, 20, 120, 20),
        shape:
            RoundedRectangleBorder(borderRadius: BorderRadius.circular(50.0)),
        onPressed: () {
          bool test = true;
          DateTime d1;
          DateTime d2;
          if (titre.text == '' ||
              description.text == '' ||
              start_date.text == '' ||
              end_date.text == '') {
            Flushbar(
              backgroundColor: Color.fromARGB(255, 235, 120, 85),
              message: "Remplir tous les champs",
              duration: Duration(seconds: 4),
            ).show(context);
            test = false;
          } else if (titre.text != '' &&
              description.text != '' &&
              start_date.text != '' &&
              end_date.text != '') {
            d1 = DateTime.parse(start_date.text);
            d2 = DateTime.parse(end_date.text);
            if (d2.isBefore(d1)) {
              Flushbar(
                backgroundColor: Color.fromARGB(255, 235, 120, 85),
                message: "La date fin doit etre apres la date debut",
                duration: Duration(seconds: 4),
              ).show(context);
              test = false;
            }
            if (description.text.length < 20) {
              Flushbar(
                backgroundColor: Color.fromARGB(255, 235, 120, 85),
                message: "La Description doit etre au moins 20 charachters ",
                duration: Duration(seconds: 4),
              ).show(context);
              test = false;
            }
            if (test == true) {
              _demandeemprunt();
            }
          }
        });
    _selectDate(BuildContext context) async {
      DateTime? pickedDate = await showDatePicker(
          context: context,
          initialDate: DateTime.now(),
          firstDate: DateTime
              .now(), //DateTime.now() - not to allow to choose before today.
          lastDate: DateTime(2101));

      if (pickedDate != null) {
        print(pickedDate); //pickedDate output format => 2021-03-10 00:00:00.000
        String formattedDate = DateFormat('yyyy-MM-dd').format(pickedDate);
        String formattedDate2 = DateFormat('MM-dd-yyyy').format(pickedDate);
        var v1 = pickedDate.difference(DateTime.now()).inDays;
        print(v1);
        print(formattedDate);
        print(DateTime
            .now()); //formatted date output using intl package =>  2021-03-16
        //you can implement different kind of Date Format here according to your requirement

        setState(() {
          start_date.text = formattedDate;
          v = v1 + 1;
        });
      } else {
        print("Date is not selected");
      }
    }

    _selectDatefin(BuildContext context) async {
      DateTime? pickedDate = await showDatePicker(
          context: context,
          initialDate: DateTime.now().add(new Duration(days: v)),
          firstDate: DateTime.now().add(new Duration(
              days: v)), //DateTime.now() - not to allow to choose before today.
          lastDate: DateTime.now().add(new Duration(days: v + 9)));

      if (pickedDate != null) {
        print(pickedDate); //pickedDate output format => 2021-03-10 00:00:00.000
        String formattedDate = DateFormat('yyyy-MM-dd').format(pickedDate);
        String formattedDate2 = DateFormat('MM-dd-yyyy').format(pickedDate);
        print(
            formattedDate); //formatted date output using intl package =>  2021-03-16
        //you can implement different kind of Date Format here according to your requirement

        setState(() {
          end_date.text = formattedDate;
        });
      } else {
        print("Date is not selected");
      }
    }

    // set up the AlertDialog
    AlertDialog alert = AlertDialog(
      content: Container(
        width: 500,
        child: SingleChildScrollView(
          child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisAlignment: MainAxisAlignment.start,
              children: <Widget>[
                const Padding(
                  padding: EdgeInsets.fromLTRB(0, 15, 0, 10),
                  child: Text(
                    "faire une demande",
                    style: TextStyle(
                        color: Colors.black,
                        fontWeight: FontWeight.bold,
                        fontSize: 20),
                  ),
                ),
                const Padding(
                  padding: EdgeInsets.fromLTRB(0, 0, 0, 10),
                  child: Text(
                    "faire une demande pour emprunter la memoire",
                    style: TextStyle(
                        color: Colors.black, fontWeight: FontWeight.normal),
                  ),
                ),
                Container(
                  height: 5.0,
                  width: 80.0,
                  decoration: const BoxDecoration(
                      color: Color.fromRGBO(45, 114, 178, 1),
                      borderRadius: BorderRadius.all(Radius.circular(10.0))),
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Padding(
                      padding: EdgeInsets.fromLTRB(0, 20, 0, 0),
                      child: Text('titre '),
                    ),
                    Padding(
                      padding: const EdgeInsets.fromLTRB(0, 0, 0, 5),
                      child: TextField(
                        controller: titre,
                        readOnly: true,
                        decoration: InputDecoration(
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(50)),
                          fillColor: const Color.fromRGBO(211, 211, 211, 1),
                          filled: true,
                        ),
                        keyboardType: TextInputType.text,
                      ),
                    )
                  ],
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Padding(
                      padding: EdgeInsets.fromLTRB(0, 5, 0, 0),
                      child: Text('Date Debut'),
                    ),
                    Padding(
                      padding: const EdgeInsets.fromLTRB(0, 0, 0, 5),
                      child: Padding(
                          padding: const EdgeInsets.fromLTRB(0, 0, 0, 10),
                          child: TextFormField(
                            decoration: InputDecoration(
                                filled: true,
                                suffixIcon: const Icon(
                                  Icons.date_range,
                                  size: 20.0,
                                ),
                                border: OutlineInputBorder(
                                    borderRadius: BorderRadius.circular(50)),
                                hintText: 'Date debut emprunt'),
                            controller: start_date,
                            readOnly: true,
                            keyboardType: TextInputType.datetime,
                            onTap: () {
                              _selectDate(context);
                            },
                          )),
                    ),
                  ],
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Padding(
                      padding: EdgeInsets.fromLTRB(0, 5, 0, 0),
                      child: Text('Date fin  '),
                    ),
                    TextFormField(
                      decoration: InputDecoration(
                          filled: true,
                          suffixIcon: const Icon(
                            Icons.date_range,
                            size: 20.0,
                          ),
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(50)),
                          hintText: 'Date fin emprunt'),
                      controller: end_date,
                      keyboardType: TextInputType.datetime,
                      readOnly: true,
                      onTap: () {
                        _selectDatefin(context);
                      },
                    ),
                  ],
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    const Padding(
                      padding: EdgeInsets.fromLTRB(0, 5, 0, 0),
                      child: Text('Description'),
                    ),
                    Padding(
                      padding: const EdgeInsets.fromLTRB(0, 0, 0, 5),
                      child: TextField(
                        controller: description,
                        decoration: InputDecoration(
                            fillColor: const Color.fromRGBO(211, 211, 211, 1),
                            filled: true,
                            border: OutlineInputBorder(
                                borderRadius: BorderRadius.circular(50)),
                            hintText: 'Description'),
                        keyboardType: TextInputType.emailAddress,
                      ),
                    )
                  ],
                ),
              ]),
        ),
      ),
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
