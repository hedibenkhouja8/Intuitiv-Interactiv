import 'package:flutter/material.dart';
import 'Admin/demandeemprunt.dart';
import 'auth/sign_in.dart';
import 'auth/sign_up.dart';
import 'page/home_page.dart';
import 'package:flutter/material.dart';
import 'package:project/auth/sign_in.dart';
import 'package:project/auth/sign_up.dart';
import 'package:project/page/mesmemoires_page.dart';
import 'package:project/page/profile_page.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'project flutter',
      theme: ThemeData(
        primaryColor: Colors.black,
      ),
      home: const MyHomePage(),
      routes: {
        '/signup': (BuildContext context) => const SignUpPage(),
        '/signin': (BuildContext context) => const SignInPage(),
        '/HomePage': (BuildContext context) => const HomePage(),
        '/Demandeemprunts': (BuildContext context) =>
            const Demandeempruntpage(),
        '/MesMemoires': (BuildContext context) => const MesMemoirespage(),
      },
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key}) : super(key: key);

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  @override
  Widget build(BuildContext context) {
    return (Scaffold(
        resizeToAvoidBottomInset: false,
        body: Container(
          height: double.infinity,
          width: double.infinity,
          decoration: const BoxDecoration(
            image: DecorationImage(
                image: AssetImage("images/index.jpg"), fit: BoxFit.cover),
          ),
          padding: const EdgeInsets.fromLTRB(15, 10, 10, 0),
          child: SingleChildScrollView(
            child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                mainAxisAlignment: MainAxisAlignment.start,
                children: <Widget>[
                  const Padding(
                    padding: EdgeInsets.fromLTRB(0, 70, 0, 10),
                    child: Text(
                      "Hello There",
                      style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                          fontSize: 35),
                    ),
                  ),
                  const Padding(
                    padding: EdgeInsets.fromLTRB(0, 0, 0, 10),
                    child: Text(
                      "Let's Sign Up To Continue",
                      style: TextStyle(
                          color: Colors.white,
                          fontWeight: FontWeight.normal,
                          fontSize: 20),
                    ),
                  ),
                  Container(
                    height: 5.0,
                    width: 90.0,
                    margin: const EdgeInsets.only(top: 10.0),
                    decoration: const BoxDecoration(
                        color: Colors.white,
                        borderRadius: BorderRadius.all(Radius.circular(10.0))),
                  ),
                  Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      Padding(
                          padding: const EdgeInsets.fromLTRB(0, 120, 0, 0),
                          child: RaisedButton(
                              color: Color.fromARGB(218, 43, 119, 218),
                              textColor: Colors.white,
                              child: const Text("Sign Up "),
                              padding:
                                  const EdgeInsets.fromLTRB(70, 20, 70, 20),
                              shape: RoundedRectangleBorder(
                                  borderRadius: BorderRadius.circular(50.0)),
                              onPressed: () {
                                Navigator.pushNamed(context, '/signup');
                              })),
                    ],
                  ),
                  Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      crossAxisAlignment: CrossAxisAlignment.center,
                      children: [
                        const Padding(
                          padding: EdgeInsets.fromLTRB(0, 5, 0, 0),
                          child: Text(
                            "Already have an account? ",
                            style: TextStyle(
                                fontSize: 17,
                                color: Colors.white,
                                fontWeight: FontWeight.bold),
                          ),
                        ),
                        FlatButton(
                            padding: const EdgeInsets.fromLTRB(0, 5, 40, 0),
                            child: const Text(
                              'Sign In',
                              style: TextStyle(
                                  fontSize: 17,
                                  color: Color.fromARGB(218, 43, 119, 218),
                                  fontWeight: FontWeight.bold),
                            ),
                            onPressed: () {
                              Navigator.pushNamed(context, '/signin');
                            })
                      ]),
                ]),
          ),
        )));
  }
}
