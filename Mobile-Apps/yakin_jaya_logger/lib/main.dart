import 'package:flutter/material.dart';
import 'package:yakin_jaya_logger/Splash_Screen.dart';
import 'package:yakin_jaya_logger/Monitoring.dart';
import 'package:yakin_jaya_logger/About_Us.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Yakin Jaya Logger',
      debugShowCheckedModeBanner: false,
      theme: ThemeData(
        primarySwatch: Colors.blue,
        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: SplashScreen(),
    );
  }
}

class MyHomePage extends StatefulWidget {
  MyHomePage({Key key, this.title}) : super(key: key);

  final String title;

  @override
  _MyHomePageState createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {

  @override
  Widget build(BuildContext context) {
    Size screenSize = MediaQuery.of(context).size;
    Orientation orientation = MediaQuery.of(context).orientation;
    return MaterialApp(
      title: 'Yakin Jaya Data Logger',
      home: Scaffold(
        appBar: AppBar(
          title: Text(widget.title),
          backgroundColor: Colors.black87,
      ),
        backgroundColor: Colors.white,
        body:
        new Container(
          decoration: new BoxDecoration(
            image: new DecorationImage(image: new AssetImage("assets/bg_flutter.png"), fit: BoxFit.cover,),
          ),
          child: LayoutBuilder(
            builder: (context, constraints) => Column(
              children: <Widget>[
                Card(
                  color: Colors.black87,
                  shape: new RoundedRectangleBorder(
                      borderRadius: new BorderRadius.circular(10.0)),
                  child: Padding(
                    padding: const EdgeInsets.all(30.0),
                    child: Column(
                      children: <Widget>[
                        Container(
                          child: Column(
                            children : <Widget>[
                              Padding(
                                padding: const EdgeInsets.all(20.0),
                                child: Container(
                                    width: 180.0,
                                    height: 90.0,
                                    decoration: new BoxDecoration(
                                        shape: BoxShape.rectangle,
                                        image: new DecorationImage(
                                          fit: BoxFit.fill,
                                          image: AssetImage('assets/lentera_horizontal_ikon.jpg'),
                                        )
                                    )),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
                Column(
                  mainAxisAlignment: MainAxisAlignment.center,
                  children: <Widget>[
                  Padding(
                    padding: const EdgeInsets.only(
                      left: 0.0, right: 0.0, top: 120.0, bottom: 0.0),
                    // ignore: deprecated_member_use
                    child :new RaisedButton(
                    elevation: 0.0,
                    shape: new RoundedRectangleBorder(
                        borderRadius: new BorderRadius.circular(30.0)),
                    padding: EdgeInsets.only(
                        top: 7.0, bottom: 7.0, right: 40.0, left: 10.0),
                    onPressed: () {
                      Navigator.push(
                          context,
                          MaterialPageRoute(builder: (context) => Monitoring())
                      );
                    },
                    child: new Row(
                      mainAxisSize: MainAxisSize.min,
                      children: <Widget>[
                        Padding(
                          padding: const EdgeInsets.all(8.0),
                          child: Container(
                              width: 30.0,
                              height: 30.0,
                              decoration: new BoxDecoration(
                                  shape: BoxShape.circle,
                                  image: new DecorationImage(
                                    fit: BoxFit.cover,
                                    image: AssetImage('assets/yakin_monitor.png'),
                                  )
                              )),
                        ),
                        Padding(
                            padding: EdgeInsets.only(left: 10.0),
                            child: new Text(
                              "Monitoring",
                              style: TextStyle(
                                  fontSize: 15.0, fontWeight: FontWeight.bold),
                            ))
                      ],
                    ),
                    textColor: Colors.white,
                    color: Colors.black87),
                ),
                Padding(
                  padding: const EdgeInsets.only(
                      left: 0.0, right: 0.0, top: 30.0, bottom: 30.0),
                  // ignore: deprecated_member_use
                  child: new RaisedButton(
                      elevation: 0.0,
                      shape: new RoundedRectangleBorder(
                          borderRadius: new BorderRadius.circular(30.0)),
                      padding: EdgeInsets.only(
                          top: 7.0, bottom: 7.0, right: 40.0, left: 10.0),
                      onPressed: () {
                        Navigator.push(
                          context,
                          MaterialPageRoute(builder: (context) => About_Us()),
                        );
                      },
                      child: new Row(
                        mainAxisSize: MainAxisSize.min,
                        children: <Widget>[
                          Padding(
                            padding: const EdgeInsets.all(8.0),
                            child: Container(
                                width: 30.0,
                                height: 30.0,
                                decoration: new BoxDecoration(
                                    shape: BoxShape.circle,
                                    image: new DecorationImage(
                                      fit: BoxFit.cover,
                                      image: AssetImage('assets/yakin_us.png'),
                                    )
                                )),
                          ),
                          Padding(
                              padding: EdgeInsets.only(left: 10.0),
                              child: new Text(
                                "About Us",
                                style: TextStyle(
                                    fontWeight: FontWeight.bold,
                                    fontSize: 15.0),
                              )
                          )
                        ],
                      ),
                      textColor: Colors.white,
                      color: Colors.black87),
                ),
                    Card(
                      color: Colors.black87,
                      shape: new RoundedRectangleBorder(
                          borderRadius: new BorderRadius.circular(0.0)),
                      child: Padding(
                        padding: const EdgeInsets.all(16.0),
                        child: Row(
                          crossAxisAlignment: CrossAxisAlignment.center,
                          mainAxisAlignment: MainAxisAlignment.center,
                          // crossAxisAlignment:CrossAxisAlignment.center,
                          children: <Widget>[
                            Column(
                              mainAxisAlignment: MainAxisAlignment.center,
                              crossAxisAlignment:CrossAxisAlignment.center,
                              children: <Widget>[
                                Text("Membangun Diri",
                                  textAlign: TextAlign.center,
                                  style: TextStyle (
                                      color: Colors.white,
                                      fontSize: 26,
                                  ),
                                ),
                                Text("Membangun Negeri",
                                  textAlign: TextAlign.center,
                                  style: TextStyle (
                                    color: Colors.white,
                                    fontSize: 26,
                                  ),
                                )
                              ],
                            ),
                          ],
                        ),
                      ),
                    ),
              ],
              ),
            ],
        ),
      ),
      ),
      ),
    );
  }
}