import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart';
import 'package:project/Admin/demandedetails.dart';
import 'package:project/page/mesmemoirestiles.dart';
import 'package:shared_preferences/shared_preferences.dart';
import 'package:project/widget/navigation_drawer_widget.dart';

import '../widget/navigation_draweradmin_widget.dart';

class MesDemandeempruntpage extends StatefulWidget {
  const MesDemandeempruntpage({Key? key}) : super(key: key);

  @override
  _MesDemandeempruntState createState() => _MesDemandeempruntState();
}

class _MesDemandeempruntState extends State<MesDemandeempruntpage> {
  dynamic data = [];

  void getdemandes() async {
    var id;
    final SharedPreferences userdata = await SharedPreferences.getInstance();
    var idd = userdata.getString("id");

    setState(() {
      id = idd;
    });
    Response response =
        await get(Uri.parse("http://127.0.0.1:8000/api/allUser/${id}"));
    dynamic responsedata = jsonDecode(response.body);
    setState(() {
      this.data = responsedata;
    });
  }

  @override
  void initState() {
    getdemandes();
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
            'Mes Demandes Emprunts',
            textAlign: TextAlign.right,
            style: TextStyle(color: Colors.white, fontSize: 15),
          ),
        ),
        backgroundColor: const Color.fromARGB(218, 43, 119, 218),
      ),
      body: SingleChildScrollView(
          child:Center(
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
                  DataColumn(label: Text('Memoire')),
                  DataColumn(label: Text('Date debut ')),
                  DataColumn(label: Text('Date fin')),
                  DataColumn(label: Text('Status')),
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
                            "${data[index]['memoire']['demande_depot']['titre']}"))),
                    DataCell(Container(
                        width: MediaQuery.of(context).size.width / 20,
                        child: Text("${data[index]['date_debut']} "))),
                    DataCell(Container(
                        width: MediaQuery.of(context).size.width / 20,
                        child: Text("${data[index]['date_fin']} "))),
                    DataCell(Container(
                        width: MediaQuery.of(context).size.width / 20,
                        child: Text("${data[index]['status']} "))),
                  ]);
                }),
              ),
            ),
          ),
        ),
      ])),)
    );
  }
}
