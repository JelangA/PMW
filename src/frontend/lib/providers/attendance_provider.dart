import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:frontend/models/attendance_model.dart';
import 'package:frontend/services/attendance_service.dart';

class AttendanceProvider with ChangeNotifier {
  final _attendanceService = AttendanceService();
  AttendanceModel? _attendanceModel;
  AttendanceModel? get attendanceModel => _attendanceModel;
  bool _isLoading = false;
  bool get isLoading => _isLoading;
  String? _workshopId;
  String? get workshopId => _workshopId;

  void setLoading(bool value) {
    _isLoading = value;
    notifyListeners();
  }

  Future<void> setWorkshopId(String value) async {
    _workshopId = value;
    notifyListeners();
  }

  Future<bool> checkAttendanceStatus(
    String nim,
  ) async {
    try {
      setLoading(true);

      if (_workshopId != null) {
        var data = await _attendanceService.checkAttendanceStatus(
          _workshopId.toString(),
          nim,
        );

        _attendanceModel = data;
      }

      setLoading(false);

      if (_attendanceModel != null) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Check Attendance Status Provider: $e");
      _attendanceModel = AttendanceModel(
        code: 500,
        status: "Error",
        message: "$e",
        id: null,
        nim: null,
        checkInTime: null,
        checkOutTime: null,
        createdAt: null,
        updatedAt: null,
        workshopId: null,
      );
      throw Exception();
    }
  }

  Future<bool> checkIn(
    String nim,
  ) async {
    try {
      setLoading(true);

      if (_workshopId != null) {
        var data = await _attendanceService.checkIn(
          _workshopId.toString(),
          nim,
        );

        _attendanceModel = data;
      }

      setLoading(false);

      if (_attendanceModel?.id != null) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Check In Provider: $e");
      _attendanceModel = AttendanceModel(
        code: 500,
        status: "Error",
        message: "$e",
        id: null,
        nim: null,
        checkInTime: null,
        checkOutTime: null,
        createdAt: null,
        updatedAt: null,
        workshopId: null,
      );
      throw Exception();
    }
  }

  Future<bool> checkOut(
    String nim,
  ) async {
    try {
      setLoading(true);

      if (_workshopId != null) {
        var data = await _attendanceService.checkOut(
          _workshopId.toString(),
          nim,
        );

        _attendanceModel = data;
      }

      setLoading(false);

      if (_attendanceModel?.id != null) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Check Out Provider: $e");
      _attendanceModel = AttendanceModel(
        code: 500,
        status: "Error",
        message: "$e",
        id: null,
        nim: null,
        checkInTime: null,
        checkOutTime: null,
        createdAt: null,
        updatedAt: null,
        workshopId: null,
      );
      throw Exception();
    }
  }
}
