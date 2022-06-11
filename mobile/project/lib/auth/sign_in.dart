import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:shared_preferences/shared_preferences.dart';

class SignInPage extends StatefulWidget {
  const SignInPage({Key? key}) : super(key: key);

  @override
  State<SignInPage> createState() => _SignInPageState();
}

class _SignInPageState extends State<SignInPage> {
  TextEditingController email = TextEditingController();
  TextEditingController mdp = TextEditingController();

  Future<void> _login() async {
    var uri = Uri.parse("http://127.0.0.1:8000/api/login");
    var data = {
      "email": email.text,
      "password": mdp.text,
    };
    var request = http.post(uri,
        body: json.encode(data), headers: {"Content-Type": "application/json"});
    var response = await request.timeout(Duration(seconds: 10));
    if (response.statusCode == 201) {
      SharedPreferences userdata = await SharedPreferences.getInstance();
      userdata.setString(
          "token", (json.decode(response.body)["token"]).toString());
      userdata.setString(
          "id", (json.decode(response.body)["user"]["id"]).toString());
      userdata.setString(
          "prenom", (json.decode(response.body)["user"]["prenom"]).toString());
      userdata.setString("etatdecompte",
          (json.decode(response.body)["user"]["etatdecompte"]).toString());
      userdata.setString("profilepic",
          (json.decode(response.body)["user"]["profilepic"]).toString());
      userdata.setString(
          "tel", (json.decode(response.body)["user"]["tel"]).toString());
      userdata.setString(
          "email", (json.decode(response.body)["user"]["email"]).toString());
      userdata.setString(
          "name", (json.decode(response.body)["user"]["name"]).toString());
      userdata.setString(
          "role", (json.decode(response.body)["user"]["role"]).toString());
      String etat =
          json.decode(response.body)["user"]["etatdecompte"].toString();
      String role = json.decode(response.body)["user"]["role"].toString();

      if (role == "etudiant") {
        var snackBar1 = const SnackBar(
          content: Text('bienvenue vous êtes connecté '),
        );
        ScaffoldMessenger.of(context).showSnackBar(snackBar1);
        Navigator.pushNamed(context, '/HomePage');
      } else if (role == "admin") {
        var snackBar2 = const SnackBar(
          content: Text('Bienvenue Admin'),
        );
        ScaffoldMessenger.of(context).showSnackBar(snackBar2);
        Navigator.pushNamed(context, '/Demandeemprunts');
      }
    } else {
      var snackBar3 = const SnackBar(
        content: Text('vérifiez vos informations !'),
      );
      ScaffoldMessenger.of(context).showSnackBar(snackBar3);
    }
  }

  bool _isObscure = true;

  @override
  Widget build(BuildContext context) {
    return (Scaffold(
      resizeToAvoidBottomInset: false,
      body: Container(
        decoration: const BoxDecoration(
          image: DecorationImage(
              image: AssetImage("images/loginbg.jpg"), fit: BoxFit.cover),
        ),
        padding: const EdgeInsets.fromLTRB(15, 10, 10, 0),
        child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisAlignment: MainAxisAlignment.start,
            children: <Widget>[
              const Padding(
                padding: EdgeInsets.fromLTRB(0, 99, 0, 10),
                child: Text(
                  "Login",
                  style: TextStyle(
                      color: Colors.white,
                      fontWeight: FontWeight.bold,
                      fontSize: 20),
                ),
              ),
              const Padding(
                padding: EdgeInsets.fromLTRB(0, 0, 0, 10),
                child: Text(
                  "Reconnectez-vous à votre compte",
                  style: TextStyle(
                      color: Colors.white, fontWeight: FontWeight.normal),
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
                    padding: EdgeInsets.fromLTRB(0, 30, 0, 0),
                    child: Text('Email ',
                        style: TextStyle(
                            color: Color.fromARGB(197, 255, 255, 255))),
                  ),
                  Padding(
                    padding: const EdgeInsets.fromLTRB(0, 0, 0, 5),
                    child: TextField(
                      controller: email,
                      decoration: InputDecoration(
                          fillColor: const Color.fromRGBO(211, 211, 211, 1),
                          filled: true,
                          border: OutlineInputBorder(
                              borderRadius: BorderRadius.circular(50)),
                          hintText: "Entrer l'adresse email"),
                      keyboardType: TextInputType.emailAddress,
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
                    child: Text('Mot de passe ',
                        style: TextStyle(color: Colors.white)),
                  ),
                  TextField(
                    controller: mdp,
                    decoration: InputDecoration(
                        fillColor: const Color.fromRGBO(211, 211, 211, 1),
                        filled: true,
                        suffixIcon: IconButton(
                            icon: Icon(_isObscure
                                ? Icons.visibility
                                : Icons.visibility_off),
                            onPressed: () {
                              setState(() {
                                _isObscure = !_isObscure;
                              });
                            }),
                        border: OutlineInputBorder(
                            borderRadius: BorderRadius.circular(50)),
                        hintText: 'Entrer le mot de passe'),
                    obscureText: _isObscure,
                    keyboardType: TextInputType.text,
                  ),
                ],
              ),
              Row(
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.center,
                children: [
                  Padding(
                      padding: const EdgeInsets.fromLTRB(0, 20, 0, 10),
                      child: RaisedButton(
                          color: const Color.fromARGB(218, 43, 119, 218),
                          textColor: Colors.white,
                          child: const Text("Connectez vous maintenant"),
                          padding: const EdgeInsets.fromLTRB(120, 20, 120, 20),
                          shape: RoundedRectangleBorder(
                              borderRadius: BorderRadius.circular(50.0)),
                          onPressed: () {
                            if (email.text == '' || mdp.text == '') {
                              var snackBar = const SnackBar(
                                content: Text(
                                    'veuillez saisir votre email et votre mot de passe!'),
                              );
                              ScaffoldMessenger.of(context)
                                  .showSnackBar(snackBar);
                            } else {
                              _login();
                            }
                          })),
                ],
              ),
            ]),
      ),
    ));
  }
}
