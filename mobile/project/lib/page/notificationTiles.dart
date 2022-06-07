import 'package:flutter/material.dart';
import 'package:project/main.dart';

class NotificationTiles extends StatelessWidget {
  final String title, subtitle, date;
  final bool enable;
  const NotificationTiles({
    Key? key,
    required this.title,
    required this.date,
    required this.subtitle,
    required this.enable,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return ListTile(
      contentPadding: EdgeInsets.symmetric(horizontal: 16.0),
      shape: RoundedRectangleBorder(
          side: BorderSide(color: Colors.black, width: 1),
          borderRadius: BorderRadius.circular(7)),
      leading: Container(
        height: 50.0,
        width: 50.0,
        decoration: BoxDecoration(
            image: DecorationImage(
                image: AssetImage("images/loc.png"), fit: BoxFit.cover)),
      ),
      title: Text(title, style: TextStyle(color: Colors.black)),
      subtitle:
          Text(subtitle + "\n" + date, style: TextStyle(color: Colors.black)),
      enabled: enable,
    );
  }
}
