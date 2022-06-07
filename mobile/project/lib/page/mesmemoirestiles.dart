import 'package:flutter/material.dart';
import 'package:project/main.dart';
import 'package:project/page/pdfreader.dart';

class MesmemoireTiles extends StatelessWidget {
  final String title, description, image, link;
  final int nbpages;
  final bool enable;
  const MesmemoireTiles({
    Key? key,
    required this.title,
    required this.link,
    required this.image,
    required this.description,
    required this.nbpages,
    required this.enable,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return GestureDetector(
        onTap: () => {
              Navigator.push(
                context,
                MaterialPageRoute(
                    builder: (context) => Pdfreader(link: link, titre: title)),
              )
            },
        child: Container(
          width: MediaQuery.of(context).size.width * 0.94,
          child: Card(
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(0.0),
            ),
            color: Colors.white70,
            elevation: 10,
            child: Wrap(
              children: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(2.0),
                  child: ConstrainedBox(
                    constraints: BoxConstraints(
                       maxWidth: MediaQuery.of(context).size.width / 3.3,
                          maxHeight: MediaQuery.of(context).size.height,
                    ),
                    child: Image.network(image, fit: BoxFit.fill),
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
                          title,
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
                          "Description :\n" + description,
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
                          "Nombre des pages :\n" + '${nbpages}',
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
        ));
  }
}
