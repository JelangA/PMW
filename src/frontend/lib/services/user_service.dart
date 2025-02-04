import 'dart:convert';
import 'dart:developer';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/generic_response_model.dart';
import 'package:frontend/models/user_model.dart';
import 'package:http/http.dart';

class UserService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<GenericResponseModel<UserModel>?> getProfileUser() async {
    String apiUrl = "${baseAPIURL()}/profile";

    try {
      String? token = await storage.read(key: 'token');
      var response = await get(
        Uri.parse(apiUrl),
        headers: header(
          true,
          token: token,
        ),
      );

      var jsonObject = jsonDecode(response.body);

      // log(jsonObject.toString());

      return GenericResponseModel.fromJson(
        jsonObject,
        (data) => UserModel.fromJson(data),
      );
    } catch (e) {
      log("Error Get Profile Service: $e");
      throw Exception("$e");
    }
  }
}
