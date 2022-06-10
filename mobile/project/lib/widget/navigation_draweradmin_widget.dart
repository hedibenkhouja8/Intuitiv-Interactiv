import 'package:flutter/material.dart';
import 'package:project/main.dart';
import 'package:project/page/home_page.dart';
import 'package:project/page/profile_page.dart';
import 'package:project/page/mesmemoires_page.dart';
import 'package:project/page/pdfreader.dart';
import 'package:http/http.dart' as http;

import 'package:shared_preferences/shared_preferences.dart';

import '../Admin/demandeemprunt.dart';
import '../Admin/notifications.dart';
import '../page/Notification_page.dart';

Future<String> getImage() async {
  final SharedPreferences userdata = await SharedPreferences.getInstance();
  var a = userdata.getString("profilepic");
  String b = "http://127.0.0.1:8000/storage/files/register/profilepic/${a}";
  return b;
}

getid() async {
  final SharedPreferences userdata = await SharedPreferences.getInstance();

  return userdata.getString("id");
}

getnom() async {
  final SharedPreferences userdata = await SharedPreferences.getInstance();
  var a = userdata.getString("prenom");
  var b = userdata.getString("name");
  var c = "${b} ${a}";
  return c;
}

getmail() async {
  final SharedPreferences userdata = await SharedPreferences.getInstance();

  return userdata.getString("email");
}

Logout() async {
  var uri = Uri.parse("http://127.0.0.1:8000/api/logout");
  var request = http.post(uri);
  //clear shared preferences
  SharedPreferences userdata = await SharedPreferences.getInstance();
  userdata.clear();
}

class NavigationDraweradminWidget extends StatelessWidget {
  final padding = const EdgeInsets.symmetric(horizontal: 20);

  const NavigationDraweradminWidget({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Drawer(
      width: 350,
      child: Material(
        color: Color.fromARGB(218, 43, 119, 218),
        child: ListView(
          children: <Widget>[
            buildHeader(
              urlImage: getImage(),
              name: getnom(),
              email: getmail(),
              onClicked: () => Navigator.of(context).push(MaterialPageRoute(
                builder: (context) => const ProfilePage(),
              )),
            ),
            Container(
              padding: padding,
              child: Column(
                children: [
                  const Divider(color: Colors.white70),
                  ListTile(
                    leading: const Icon(
                      Icons.library_books,
                      color: Colors.white,
                    ),
                    title: const Text(
                      'Demandes Emprunts',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: () => {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) => const Demandeempruntpage()),
                      )
                    },
                  ),
                  const Divider(color: Colors.white70),
                  ListTile(
                    leading: const Icon(
                      Icons.book_outlined,
                      color: Colors.white,
                    ),
                    title: const Text(
                      'Demandes Depots',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: () => {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) => const MesMemoirespage()),
                      )
                    },
                  ),
                  const Divider(color: Colors.white70),
                  ListTile(
                    leading: const Icon(
                      Icons.account_circle,
                      color: Colors.white,
                    ),
                    title: const Text(
                      'Profile',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: () => {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) => const ProfilePage()),
                      )
                    },
                  ),
                  const Divider(color: Colors.white70),
                  ListTile(
                    leading: const Icon(
                      Icons.notifications_outlined,
                      color: Colors.white,
                    ),
                    title: const Text(
                      'Notifications',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: () => {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                            builder: (context) =>
                                const NotificationadminPage()),
                      )
                    },
                  ),
                  ListTile(
                    leading: const Icon(
                      Icons.logout,
                      color: Colors.white,
                    ),
                    title: const Text(
                      'Logout',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: () => {
                      Logout(),
                      Navigator.push(
                        context,
                        MaterialPageRoute(builder: (context) => MyHomePage()),
                      )
                    },
                  ),
                  const Divider(color: Colors.white70),
                  const SizedBox(
                    height: 10,
                    child: DecoratedBox(
                      decoration: const BoxDecoration(color: Colors.white70),
                    ),
                  ),
                  Text(
                    "Contact Us",
                    style: TextStyle(
                        color: Colors.white70, fontWeight: FontWeight.bold),
                  ),
                  ListTile(
                    leading: CircleAvatar(
                        radius: 30,
                        backgroundColor: Colors.white24,
                        child: Icon(
                          Icons.alternate_email_sharp,
                          color: Colors.white,
                        )),
                    title: const Text(
                      'oussamahedi@iset.com',
                      style: TextStyle(color: Colors.white),
                    ),
                    onTap: null,
                  ),
                  Padding(
                      padding: EdgeInsets.fromLTRB(0, 10, 0, 10),
                      child: ListTile(
                        leading: CircleAvatar(
                            radius: 30,
                            backgroundColor: Colors.white24,
                            child: Icon(
                              Icons.location_on_sharp,
                              color: Colors.white,
                            )),
                        title: const Text(
                          'Bizerte,tunisia',
                          style: TextStyle(color: Colors.white),
                        ),
                        onTap: null,
                      )),
                  Padding(
                      padding: EdgeInsets.fromLTRB(0, 0, 0, 0),
                      child: ListTile(
                        leading: CircleAvatar(
                            radius: 30,
                            backgroundColor: Colors.white24,
                            child: Icon(
                              Icons.phone,
                              color: Colors.white,
                            )),
                        title: const Text(
                          '+216 29867598',
                          style: TextStyle(color: Colors.white),
                        ),
                        onTap: null,
                      )),
                ],
              ),
            ),
            Row(
              mainAxisAlignment: MainAxisAlignment.center,
              children: const [
                Padding(
                    padding: const EdgeInsets.fromLTRB(0, 10, 0, 10),
                    child: Text(
                      "made with",
                      style: TextStyle(color: Colors.white, fontSize: 10),
                    )),
                Padding(
                    padding: const EdgeInsets.fromLTRB(0, 10, 0, 10),
                    child: Icon(
                      Icons.favorite,
                      color: Colors.white,
                      size: 10,
                    )),
                Padding(
                    padding: const EdgeInsets.fromLTRB(0, 10, 0, 10),
                    child: Text(
                      "By oussama & hedi",
                      style: TextStyle(color: Colors.white, fontSize: 10),
                    )),
              ],
            )
          ],
        ),
      ),
    );
  }

  Widget buildHeader({
    required urlImage,
    required name,
    required email,
    required VoidCallback onClicked,
  }) =>
      InkWell(
        onTap: onClicked,
        child: Container(
          padding: padding.add(EdgeInsets.symmetric(vertical: 40)),
          child: Row(
            children: [
              FutureBuilder(
                  future: urlImage,
                  builder: (context, snapshot) {
                    return CircleAvatar(
                        radius: 30,
                        backgroundImage: NetworkImage('${snapshot.data}'));
                  }),
              SizedBox(width: 20),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  FutureBuilder(
                      future: name,
                      builder: (context, snapshot) {
                        return Text(
                          '${snapshot.data}',
                          style: TextStyle(fontSize: 14, color: Colors.white),
                        );
                      }),
                  const SizedBox(height: 4),
                  FutureBuilder(
                      future: email,
                      builder: (context, snapshot) {
                        return Text(
                          '${snapshot.data}',
                          style: TextStyle(fontSize: 14, color: Colors.white),
                        );
                      }),
                ],
              ),
              Spacer(),
              Icon(Icons.edit, color: Colors.white),
            ],
          ),
        ),
      );

  Widget buildSearchField() {
    final color = Colors.white;

    return TextField(
      style: TextStyle(color: color),
      decoration: InputDecoration(
        contentPadding: EdgeInsets.symmetric(horizontal: 20, vertical: 15),
        hintText: 'Search',
        hintStyle: TextStyle(color: color),
        prefixIcon: Icon(Icons.search, color: color),
        filled: true,
        fillColor: Colors.white12,
        enabledBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(5),
          borderSide: BorderSide(color: color.withOpacity(0.7)),
        ),
        focusedBorder: OutlineInputBorder(
          borderRadius: BorderRadius.circular(5),
          borderSide: BorderSide(color: color.withOpacity(0.7)),
        ),
      ),
    );
  }

  Widget buildMenuItem({
    required String text,
    required IconData icon,
    VoidCallback? onTap,
  }) {
    const color = Colors.white;
    const hoverColor = Colors.white70;

    return ListTile(
      leading: Icon(icon, color: color),
      title: Text(text, style: TextStyle(color: color)),
      hoverColor: hoverColor,
      onTap: onTap,
    );
  }
}
