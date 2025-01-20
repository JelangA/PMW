import 'dart:convert';
import 'dart:developer';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/workshop_model.dart';
import 'package:http/http.dart';

class WorkshopService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<List<WorkshopModel>> getAllWorkshop() async {
    String apiUrl = "${baseAPIURL()}/workshops";

    try {
      String? token = await storage.read(key: 'token');
      var response = await get(
        Uri.parse(apiUrl),
        headers: header(
          true,
          token: token,
        ),
      );

      if (response.statusCode == 200) {
        var jsonObject = jsonDecode(response.body);
        var metadata = jsonObject['metadata'];
        var objectData = jsonObject['data'] as List;

        return objectData.map((data) {
          return WorkshopModel.fromJson(metadata, data);
        }).toList();
      } else {
        return [];
      }
    } catch (e) {
      log("Error Get All Workshop Service: $e");
      throw Exception("$e");
    }
  }
}
