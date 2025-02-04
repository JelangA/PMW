import 'dart:convert';
import 'dart:developer';
import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/authentication_model.dart';
import 'package:frontend/models/generic_response_model.dart';
import 'package:http/http.dart';

class AuthenticationService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<GenericResponseModel<AuthenticationModel>?> signIn(
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
          await storage.write(key: "isRemember", value: "1");
          await storage.write(key: "token", value: jsonObject['data']);
        } else {
          await storage.write(key: "isRemember", value: "0");
          await storage.write(key: "token", value: jsonObject['data']);
        }
      }

      return GenericResponseModel.fromJson(
        jsonObject,
        (data) => AuthenticationModel.fromJson(data),
      );
    } catch (e) {
      log("Error Sign In Service: $e");
      throw Exception("$e");
    }
  }

  Future<GenericResponseModel<AuthenticationModel>?> signUp(
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

      return GenericResponseModel.fromJson(
        jsonObject,
        (data) => AuthenticationModel.fromJson(data),
      );
    } catch (e) {
      log("Error Sign Up Service: $e");
      throw Exception("$e");
    }
  }

  Future<bool> requestOtp(String email) async {
    String apiUrl = "${baseAPIURL()}/forgot-password/send-otp";

    try {
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(false),
        body: {
          "email": email,
        },
      );

      // var jsonObject = jsonDecode(response.body);

      if (response.statusCode == 200) {
        // log(jsonObject.toString());

        return true;
      } else {
        return false;
      }
    } catch (e) {
      log("Error Request OTP Service: $e");
      throw Exception("$e");
    }
  }

  Future<bool> changePassword(
    String email,
    String otp,
    String newPassword,
    String confirmNewPassword,
  ) async {
    String apiUrl = "${baseAPIURL()}/forgot-password/change-password";

    try {
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(false),
        body: {
          "email": email,
          "otp": otp,
          "new_password": newPassword,
          "new_password_confirmation": confirmNewPassword,
        },
      );

      // var jsonObject = jsonDecode(response.body);

      if (response.statusCode == 200) {
        // log(jsonObject.toString());

        return true;
      } else {
        return false;
      }
    } catch (e) {
      log("Error Change Password Service: $e");
      throw Exception("$e");
    }
  }
}
