import 'dart:convert';

import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/authentication_model.dart';
import 'package:http/http.dart';

class AuthenticationService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<AuthenticationModel> signIn(
    String email,
    String password,
  ) async {
    String apiUrl = "${baseAPIURL()}/auth/login";

    try {
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(false),
        body: {
          "email": email,
          "password": password,
        },
      );

      if (response.statusCode == 200) {
        var jsonObject = jsonDecode(response.body);
        await storage.write(key: "token", value: jsonObject['data']);

        return AuthenticationModel.fromJson(jsonObject);
      } else {
        var jsonObject = jsonDecode(response.body);

        return AuthenticationModel.fromJson(jsonObject);
      }
    } catch (e) {
      throw Exception("$e");
    }
  }
}
