import 'dart:collection';

import 'package:flutter/material.dart';
// import 'package:typicons_flutter/typicons.dart';
// import 'package:crypto_font_icons/crypto_font_icons.dart';
import 'package:yakin_jaya_logger/Data_From_Databae.dart';
import 'package:yakin_jaya_logger/Service.dart';

class Monitoring extends StatefulWidget {
  //
  Monitoring() : super();
  final String title = 'Monitoring';

  @override
  MonitoringState createState() => MonitoringState();
}

class MonitoringState extends State<Monitoring> {
  List<MyData> _myData;
  GlobalKey<ScaffoldState> _scaffoldKey;
  MediaQueryData queryData;
  // queryData = MediaQuery.of(context);
  // String _titleProgress;
  String _value = "Jam";
  @override
  void initState() {
    _myData = [];
    // _titleProgress = "Monitoring";
    _scaffoldKey = GlobalKey(); // key to get the context to show a SnackBar
    _getMyData();
    super.initState();
  }

  _getMyData() {
    Services.getMyData(Services.Time_Stamp).then((myData){
      // print('ini lho mydata {$myData}');
      setState(() {
        _myData = myData;
        print('ini lho _mydata {$_myData}');
        // print('ini lho mydata {$myData}');
      });
      // print("Length ${myData.length} ini wafiq");
    });
  }
  Widget personDetailCard(MyData) {
    return Padding(
      padding: const EdgeInsets.all(0.0),
        child: ListView(
            shrinkWrap: true,
            children : <Widget>[
              Card(
                color: Colors.black87,
                shape: new RoundedRectangleBorder(
                    borderRadius: new BorderRadius.circular(10.0)),
                child: Padding(
                  padding: const EdgeInsets.all(10.0),
                  child: Column(
                    children: <Widget>[
                      Container(
                        child: Column(
                        children : <Widget>[
                          Padding(
                            padding: const EdgeInsets.all(8.0),
                            child: Container(
                                width: 180.0,
                                height: 70.0,
                                decoration: new BoxDecoration(
                                    shape: BoxShape.rectangle,
                                    image: new DecorationImage(
                                      fit: BoxFit.fill,
                                      image: AssetImage('assets/lentera_horizontal_ikon.jpg'),
                                    )
                                )),
                          ),
                          Row(
                            mainAxisAlignment: MainAxisAlignment.center,
                            crossAxisAlignment:CrossAxisAlignment.center,
                            children: <Widget>[
                            Text("Waktu",
                              textAlign: TextAlign.center,
                              style: TextStyle (
                              color: Colors.blue,
                              fontSize: 26,
                            ),
                          ),
                        ],
                      ),
                          Row(
                              mainAxisAlignment: MainAxisAlignment.center,
                              crossAxisAlignment:CrossAxisAlignment.center,
                            children: <Widget>[
                            Text(MyData.Waktu,
                              textAlign: TextAlign.right,
                              style: TextStyle (
                                color: Colors.white,
                                fontSize: 26
                                ),
                              ),
                            ]
                          ),
                        ],
                      ),
                      ),
                    ],
                  ),
                ),
              ),
              Card(
                color: Colors.black87,
                shape: new RoundedRectangleBorder(
                    borderRadius: new BorderRadius.circular(40.0)),
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Row(
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Container(
                            width: 30.0,
                            height: 20.0,
                            decoration: new BoxDecoration(
                                shape: BoxShape.circle,
                                image: new DecorationImage(
                                  fit: BoxFit.cover,
                                  image: AssetImage('assets/monitoring_simbols/arah.png'),
                                )
                            )),
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text("Arah Angin",
                            style: TextStyle (
                                color: Colors.blue,
                                fontSize: 18
                            ),
                          ),
                          Text(MyData.Arah_Angin + " Derajat",
                            style: TextStyle (
                                color: Colors.white,
                                fontSize: 14
                            ),
                          )
                        ],
                      ),
                    ],
                  ),
                ),
              ),
          Card(
          color: Colors.black87,
          shape: new RoundedRectangleBorder(
              borderRadius: new BorderRadius.circular(40.0)),
            child: Padding(
              padding: const EdgeInsets.all(8.0),
              child: Row(
              children: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Container(
                    width: 30.0,
                    height: 20.0,
                    decoration: new BoxDecoration(
                        shape: BoxShape.circle,
                        image: new DecorationImage(
                          fit: BoxFit.cover,
                          image: AssetImage('assets/monitoring_simbols/kecepatan.png'),
                        )
                    )),
              ),
              Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: <Widget>[
                  Text("Kecepatan Angin",
                    style: TextStyle (
                        color: Colors.blue,
                        fontSize: 18
                    ),
                  ),
                  Text(MyData.Kecepatan_Angin + " Mps",
                    style: TextStyle (
                        color: Colors.white,
                        fontSize: 14
                    ),
                  )
                ],
              ),
            ],
          ),
        ),
      ),
              Card(
                color: Colors.black87,
                shape: new RoundedRectangleBorder(
                    borderRadius: new BorderRadius.circular(40.0)),
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Row(
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Container(
                            width: 30.0,
                            height: 20.0,
                            decoration: new BoxDecoration(
                                shape: BoxShape.circle,
                                image: new DecorationImage(
                                  fit: BoxFit.cover,
                                  image: AssetImage('assets/monitoring_simbols/kecepatan.png'),
                                )
                            )),
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text("Suhu Udara",
                            style: TextStyle (
                                color: Colors.blue,
                                fontSize: 18
                            ),
                          ),
                          Text(MyData.Suhu_Udara + " Celcius",
                            style: TextStyle (
                                color: Colors.white,
                                fontSize: 14
                            ),
                          )
                        ],
                      ),
                    ],
                  ),
                ),
              ),
              Card(
                color: Colors.black87,
                shape: new RoundedRectangleBorder(
                    borderRadius: new BorderRadius.circular(40.0)),
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Row(
                    children: <Widget>[
                      Padding(
                        padding: const EdgeInsets.all(8.0),
                        child: Container(
                            width: 30.0,
                            height: 20.0,
                            decoration: new BoxDecoration(
                                shape: BoxShape.circle,
                                image: new DecorationImage(
                                  fit: BoxFit.cover,
                                  image: AssetImage('assets/monitoring_simbols/kecepatan.png'),
                                )
                            )),
                      ),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: <Widget>[
                          Text("Tekanan Udara",
                            style: TextStyle (
                                color: Colors.blue,
                                fontSize: 18
                            ),
                          ),
                          Text(MyData.Tekanan_Udara + " mb",
                            style: TextStyle (
                                color: Colors.white,
                                fontSize: 14
                            ),
                          )
                        ],
                      ),
                    ],
                  ),
                ),
              ),
        Card(
          color: Colors.black87,
          shape: new RoundedRectangleBorder(
              borderRadius: new BorderRadius.circular(40.0)),
          child: Padding(
            padding: const EdgeInsets.all(8.0),
            child: Row(
              children: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Container(
                      width: 30.0,
                      height: 20.0,
                      decoration: new BoxDecoration(
                          shape: BoxShape.circle,
                          image: new DecorationImage(
                            fit: BoxFit.cover,
                            image: AssetImage('assets/monitoring_simbols/tegangan.png'),
                          )
                      )),
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text("Tegangan",
                      style: TextStyle (
                          color: Colors.blue,
                          fontSize: 18
                      ),
                    ),
                    Text(MyData.Tegangan + " Volt",
                      style: TextStyle (
                          color: Colors.white,
                          fontSize: 14
                      ),
                    )
                  ],
                ),
              ],
            ),
          ),
        ),
              Card(
                color: Colors.black87,
                shape: new RoundedRectangleBorder(
                    borderRadius: new BorderRadius.circular(40.0)),
          child: Padding(
            padding: const EdgeInsets.all(8.0),
            child: Row(
              children: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Container(
                      width: 30.0,
                      height: 20.0,
                      decoration: new BoxDecoration(
                          shape: BoxShape.circle,
                          image: new DecorationImage(
                            fit: BoxFit.cover,
                            image: AssetImage('assets/monitoring_simbols/arus.png'),
                          )
                      )),
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text("Arus",
                      style: TextStyle (
                          color: Colors.blue,
                          fontSize: 18
                      ),
                    ),
                    Text(MyData.Arus + " Ampere",
                      style: TextStyle (
                          color: Colors.white,
                          fontSize: 14
                      ),
                    )
                  ],
                ),
              ],
            ),
          ),
        ),
        Card(
          color: Colors.black87,
          shape: new RoundedRectangleBorder(
              borderRadius: new BorderRadius.circular(40.0)),
          child: Padding(
            padding: const EdgeInsets.all(8.0),
            child: Row(
              children: <Widget>[
                Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Container(
                      width: 30.0,
                      height: 20.0,
                      decoration: new BoxDecoration(
                          shape: BoxShape.circle,
                          image: new DecorationImage(
                            fit: BoxFit.cover,
                            image: AssetImage('assets/monitoring_simbols/daya.png'),
                          )
                      )),
                ),
                Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: <Widget>[
                    Text("Daya",
                      style: TextStyle (
                          color: Colors.blue,
                          fontSize: 18
                      ),
                    ),
                    Text(MyData.Kwh + " KWH",
                      style: TextStyle (
                          color: Colors.white,
                          fontSize: 14
                      ),
                    )
                  ],
                ),
              ],
            ),
          ),
        ),
      ]
      )
    );
  }
  // UI
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      body:
        Container(
          decoration: new BoxDecoration(
            image: new DecorationImage(image: new AssetImage("assets/bg_flutter.png"), fit: BoxFit.cover,),
          ),
            child : Padding(
              padding: const EdgeInsets.fromLTRB(10, 20, 10, 10),
              child: Column(
                children: _myData.map((p) {
                  return personDetailCard(p);
              }).toList()
              ),
            ),
        ),
        key: _scaffoldKey,
        appBar: new AppBar(
              title:
              new Row(
                mainAxisSize: MainAxisSize.min,
                children: <Widget>[
                new Theme(
                data: Theme.of(context).copyWith(
                  canvasColor: Colors.black87,
                ),
                  child : DropdownButton<String>(
                    value: _value,
                    items: <DropdownMenuItem<String>>[
                      new DropdownMenuItem(child: new Text('Jam', style: TextStyle (color: Colors.white,)), value: 'Jam',),
                      new DropdownMenuItem(child: new Text('Hari',style: TextStyle (color: Colors.white,)), value: 'Hari',),
                      // new DropdownMenuItem(child: new Text('Minggu',style: TextStyle (color: Colors.white,)), value: 'Minggu',),
                      new DropdownMenuItem(child: new Text('Bulan',style: TextStyle (color: Colors.white,)), value: 'Bulan',),
                      new DropdownMenuItem(child: new Text('Tahun',style: TextStyle (color: Colors.white,)), value: 'Tahun',),
                      // new DropdownMenuItem(child: new Text('Seluruh Data',style: TextStyle (color: Colors.white,)), value: 'Semua',),
                    ],
                    onChanged: (String value) {
                      setState(() => _value = value);
                      if(_value == 'Jam')
                        Services.Time_Stamp = 'GET_HOURS';
                      else if(_value == 'Hari')
                        Services.Time_Stamp = 'GET_DAYS';
                      // else if(_value == 'Minggu')
                        // Services.Time_Stamp = 'GET_WEEKS';
                      else if(_value == 'Bulan')
                        Services.Time_Stamp = 'GET_MONTHS';
                      else if(_value == 'Tahun')
                        Services.Time_Stamp = 'GET_YEARS';
                      // else if(_value == 'Semua')
                        // Services.Time_Stamp = 'GET_ALL';
                      print("time stamp nya adalah " + Services.Time_Stamp);
                      _getMyData();
                    },
                  ),
                ),
                ],
          ),
            backgroundColor: Colors.black87,
      ),
    );
  }
}