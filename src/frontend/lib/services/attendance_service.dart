import 'dart:convert';
import 'dart:developer';

import 'package:flutter_secure_storage/flutter_secure_storage.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/attendance_model.dart';
import 'package:http/http.dart';

class AttendanceService {
  final storage = FlutterSecureStorage(webOptions: getWebOptions());

  Future<AttendanceModel> checkAttendanceStatus(
    String workshopId,
    String nim,
  ) async {
    String apiUrl =
        "${baseAPIURL()}/attendance/$workshopId/check-attendance-status";

    try {
      String? token = await storage.read(key: 'token');
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(
          true,
          token: token,
        ),
        body: {
          "student": nim,
        },
      );

      var jsonObject = jsonDecode(response.body);

      // log(jsonObject.toString());

      return AttendanceModel.fromJson(jsonObject);
    } catch (e) {
      log("Error Check Attendance Status Service: $e");
      throw Exception("$e");
    }
  }

  Future<AttendanceModel> checkIn(
    String workshopId,
    String nim,
  ) async {
    String apiUrl = "${baseAPIURL()}/attendance/$workshopId/check-in";

    try {
      String? token = await storage.read(key: 'token');
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(
          true,
          token: token,
        ),
        body: {
          "student": nim,
        },
      );

      var jsonObject = jsonDecode(response.body);

      return AttendanceModel.fromJson(jsonObject);
    } catch (e) {
      log("Error Check In Service: $e");
      throw Exception("$e");
    }
  }

  Future<AttendanceModel> checkOut(
    String workshopId,
    String nim,
  ) async {
    String apiUrl = "${baseAPIURL()}/attendance/$workshopId/check-out";

    try {
      String? token = await storage.read(key: 'token');
      var response = await post(
        Uri.parse(apiUrl),
        headers: header(
          true,
          token: token,
        ),
        body: {
          "student": nim,
        },
      );

      var jsonObject = jsonDecode(response.body);

      return AttendanceModel.fromJson(jsonObject);
    } catch (e) {
      log("Error Check Out Service: $e");
      throw Exception("$e");
    }
  }
}
