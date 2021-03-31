
class MyData{
  String nomor;
  String Arah_Angin;
  String Kecepatan_Angin;
  String Suhu_Udara;
  String Tekanan_Udara;
  String Tegangan;
  String Arus;
  String Kwh;
  String Waktu;

  MyData({this.nomor, this.Arah_Angin, this.Kecepatan_Angin,this.Suhu_Udara, this.Tekanan_Udara ,this.Tegangan, this.Arus, this.Kwh,this.Waktu});

  factory MyData.fromJson(Map<String, dynamic> json) {
    return MyData(
      // nomor: json["nomor"] as String,
      Arah_Angin: json["arah_angin"] as String,
      Kecepatan_Angin: json["kecepatan_angin"] as String,
      Suhu_Udara: json["suhu_udara"] as String,
      Tekanan_Udara: json["tekanan_udara"] as String,
      Tegangan: json["tegangan"] as String,
      Arus: json["arus"] as String,
      Kwh: json["kws"] as String,
      Waktu: json["waktu"] as String,
    );
  }
  // factory MyData.fromJson(Map<String, dynamic> map) {
  //   return MyData(
  //     nomor: map['nomor'] as String,
  //     Arah_Angin: map["arah_angin"] as String,
  //     Kecepatan_Angin: map["kecepatan_angin"] as String,
  //     Tegangan: map["tegangan"] as String,
  //     Arus: map["arus"] as String,
  //     Kwh: map["kws"] as String,
  //     Waktu: map["waktu"] as String,
  //   );
  // }
}