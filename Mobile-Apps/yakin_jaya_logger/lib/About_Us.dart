import 'package:carousel_pro/carousel_pro.dart';
import 'package:flutter/cupertino.dart';
import 'package:flutter/material.dart';

class About_Us extends StatefulWidget{
  _About_UsState createState() => _About_UsState();
}

class _About_UsState extends State<About_Us>{
  Widget build(BuildContext context){
    return Scaffold(
        body: Padding(
          padding: EdgeInsets.symmetric(vertical: 5.0),
          child: Center(
            child: Column(
              children: <Widget>[
                Container(
                  height: 700,
                  child: Carousel(
                    autoplay: false,
                    indicatorBgPadding: 0.0,
                    images: [
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, children: <Widget>[
                            // Container(
                              // decoration: new BoxDecoration(
                                // image: new DecorationImage(image: new AssetImage("assets/lentera_horizontal_ikon.jpg"), fit: BoxFit.cover,),
                              // ),
                            Image.asset(
                                'assets/lentera_ikon.png',
                                fit: BoxFit.fill,
                                // height: 250,
                                // width: 250,
                            ),
                            const ListTile(
                              // leading: Icon(Icons.album),
                              title: Text('Lentera Bumi Nusantara'),
                              subtitle:
                              Text('Aplikasi ini dibuat sebagai prototipe monitoring data turbin angin yang ada pada PT Lentera Bumi Nusantara' ),
                            ),
                          // ),
                            ]
                          ),
                      ),
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, children: <Widget>[
                            Image.asset(
                                'assets/for_carousel/bang_ricky.jpg',
                                fit: BoxFit.fitWidth),
                            const ListTile(
                              leading: Icon(Icons.account_circle_sharp),
                              title: Text('Founder : Ricky Elson',style: TextStyle (
                                color: Colors.black,
                                fontSize: 24,
                              ),
                              ),
                              subtitle:
                              Text('\n'
                                'Ricky Elson (lahir di Padang, Sumatra Barat, 11 Juni 1980; umur 40 tahun) adalah seorang teknokrat Indonesia yang ahli dalam teknologi motor penggerak listrik. Ia yang merancang bangun mobil listrik Selo bersama Danet Suryatama yang merancang bangun Tucuxi dianggap sebagai pelopor mobil listrik nasional.'
                                  'Ricky menempuh pendidikan tinggi teknologinya di Jepang, kemudian bekerja di sebuah perusahaan di negeri sakura itu. Selama 14 tahun di sana, Ricky telah menemukan belasan teknologi motor penggerak listrik yang sudah dipatenkan di Jepang.'
                              ,style: TextStyle (
                                  color: Colors.black54,
                                  fontSize: 15,
                                ),
                              ),
                            ),
                          ])
                      ),
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, mainAxisAlignment: MainAxisAlignment.center, children: <Widget>[
                            const ListTile(
                              // leading: Icon(Icons.account_circle_sharp),
                              subtitle:
                              Text('Developer',
                                textAlign: TextAlign.center,
                                style: TextStyle (
                                  color: Colors.black,
                                  fontSize: 45,
                                ),
                              ),
                            ),
                          ])
                      ),
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, children: <Widget>[
                            Image.asset(
                                'assets/for_carousel/cahyo_about.png',
                                fit: BoxFit.fill),
                            const ListTile(
                              leading: Icon(Icons.account_circle_sharp),
                              title: Text('Nur Cahyo Ihsan Prastyawan',
                                style: TextStyle (
                                  color: Colors.black,
                                  fontSize: 30),
                              ),
                              subtitle:
                              Text(
                                '\n'
                                'TTL                : Probolinggo, 12 April 2000\n'
                                  'Konsentrasi  : Data Logger\n'
                                  'Role               : Embedded Engineer\n'
                                  'Quote            : Hidup adalah Penderitaan\n',

                                  style: TextStyle (
                                    color: Colors.black54,
                                    fontSize: 19,
                                ),
                              ),
                            ),
                          ])
                      ),
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, children: <Widget>[
                            Image.asset(
                                'assets/for_carousel/didi_about.jpg',
                                fit: BoxFit.fill,
                            ),
                            const ListTile(
                              leading: Icon(Icons.account_circle_sharp),
                              title: Text('Didi Alfandi',
                                style: TextStyle (
                                  color: Colors.black,
                                  fontSize: 30,
                                ),
                              ),
                              subtitle:
                              Text('\n'
                                'TTL                :Gresik, 25 Mei 1999 \n'
                                  'Konsentrasi  : Data Logger\n'
                                  'Role               : Hardware Engineer\n'
                                  'Quote            : Hidup itu sederhana\n',
                                style: TextStyle (
                                  color: Colors.black54,
                                  fontSize: 19,
                                ),
                              ),
                            ),
                          ])
                      ),
                      Card(
                          child:
                          Column(mainAxisSize: MainAxisSize.min, children: <Widget>[
                            Image.asset(
                                'assets/for_carousel/wafiq_about.jpeg',
                                fit: BoxFit.fitHeight,
                            ),
                            const ListTile(
                              leading: Icon(Icons.account_circle_sharp),
                              title: Text('Muhammad Wafiq Kamaluddin',
                                style: TextStyle (
                                  color: Colors.black,
                                  fontSize: 30,
                                ),
                              ),
                              subtitle:
                              Text('TTL                : Bojonegoro, 16 November 1999\n'
                                  'Konsentrasi  : Data Logger\n'
                                  'Role               : Programmer\n'
                                  'Quote            : Berlayarlah kita tak pernah tahu apa yang ada di seberang sana\n',
                                style: TextStyle (
                                  color: Colors.black54,
                                  fontSize: 19,
                                ),
                              ),
                            ),
                          ])
                      ),
                    ],
                  ),
                ),
              ],
            )
          ),
        ),
    );
  }
}