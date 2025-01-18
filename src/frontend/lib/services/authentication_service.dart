import 'dart:convert';
import 'dart:developer';

import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/authentication_model.dart';
import 'package:http/http.dart';

class AuthenticationService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<AuthenticationModel> signIn(
    String email,
    String password, {
    bool isRemember = false,
  }) async {
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

      var jsonObject = jsonDecode(response.body);

      if (response.statusCode == 200) {
        if (isRemember) {
          await storage.write(key: "token", value: jsonObject['data']);
        }

        return AuthenticationModel.fromJson(jsonObject);
      } else {
        return AuthenticationModel.fromJson(jsonObject);
      }
    } catch (e) {
      log("$e");
      throw Exception("$e");
    }
  }

  Future<AuthenticationModel> signUp(
    String nim,
    String name,
    String email,
    String password,
  ) async {
    String apiUrl = "${baseAPIURL()}/auth/register";

    try {
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(false),
        body: {
          "nim": nim,
          "name": name,
          "email": email,
          "password": password,
        },
      );

      var jsonObject = jsonDecode(response.body);

      if (response.statusCode == 200) {
        return AuthenticationModel.fromJson(jsonObject);
      } else {
        return AuthenticationModel.fromJson(jsonObject);
      }
    } catch (e) {
      log("$e");
      throw Exception("$e");
    }
  }
}
