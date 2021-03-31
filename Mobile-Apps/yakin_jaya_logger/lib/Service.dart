import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:yakin_jaya_logger/Data_From_Databae.dart';

class Services {
  static String Time_Stamp = "";
  // var aku = 1;
  static const ROOT = "https://mywebwafiq16.000webhostapp.com/Lentera_Bumi_Nusantara/Monitoring_To_Flutter.php";
  // Services({this.Time_Stamp});
  static Future <List<MyData>> getMyData(String Time_Stamp) async{
    try{
      // print("haha ra kenek");
      // print("ini time stamp ku" + Time_Stamp);
      var map = Map<String, dynamic>();
      map["action"] = Time_Stamp;//_GET_ALL_ACTION;
      final response = await http.post(ROOT, body: map);
      print("get data from data base : ${response.body}");
      print("map gue adalah" + map["action"]);
      if(200 == response.statusCode)
      {
        List<MyData> list = parseResponse(response.body);
        print("kenek");
        return list;
      }
      else
        {
          print("rakenek");
          return <MyData>[];
        }
    }
    catch(e){
      print("rakenek pindo");
      print(e);
      return <MyData>[];
    }
  }

  static List<MyData> parseResponse(String responseBody){
    final parsed = json.decode(responseBody).cast<Map<String, dynamic>>();
    // print('ini parsed ${parsed}');
    // print('hasil dari ${List<MyData>.from(parsed.map<MyData>((json) => MyData.fromJson(json)).toList())}');
    return List<MyData>.from(parsed.map<MyData>((json) => MyData.fromJson(json)).toList());
  }
  // static List<MyData> parseResponse(String responseBody) {
  //   final Map<String, dynamic> parsed = json.decode(responseBody);
  //   print('ini parsed ${parsed}');
  //   return List<MyData>.from(
  //       parsed[''].map((x) => MyData.fromJson(x)));
  // }
}
