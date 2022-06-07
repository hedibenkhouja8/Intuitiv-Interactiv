import 'dart:io';

import 'package:flutter/material.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'dart:convert';
import 'package:http/http.dart';
import 'package:project/widget/navigation_drawer_widget.dart';
import 'package:syncfusion_flutter_pdfviewer/pdfviewer.dart';

class Pdfreader extends StatefulWidget {
  final String link, titre;
  const Pdfreader({
    Key? key,
    required this.link,
    required this.titre,
  }) : super(key: key);

  @override
  _PdfreaderState createState() => _PdfreaderState(link, titre);
}

class _PdfreaderState extends State<Pdfreader> {
  dynamic data = [];
  String link;
  String titre;
  _PdfreaderState(this.link, this.titre);
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
          title: Center(child: Text(titre)),
          backgroundColor: const Color.fromARGB(218, 43, 119, 218),
        ),
        body: Center(
          child: Container(
            child: SfPdfViewer.asset(
              'file/Mem.pdf',
            ),
          ),
        ));
  }
}
