import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:frontend/common/exception/app_exception.dart';
import 'package:frontend/models/authentication_model.dart';
import 'package:frontend/models/generic_response_model.dart';
import 'package:frontend/services/authentication_service.dart';

class AuthenticationProvider with ChangeNotifier {
  final _authenticationService = AuthenticationService();
  GenericResponseModel<AuthenticationModel>? _authenticationModel;
  GenericResponseModel<AuthenticationModel>? get authenticationModel => _authenticationModel;
  bool _isRemember = false;
  bool get isRemember => _isRemember;
  bool _isObscureText = true;
  bool get isObscureText => _isObscureText;
  bool _isObscureConfrimationText = true;
  bool get isObscureConfrimationText => _isObscureConfrimationText;
  bool _isLoading = false;
  bool get isLoading => _isLoading;

  void setIsRemember(bool value) {
    _isRemember = value;
    notifyListeners();
  }

  void setIsObscureText(bool value) {
    _isObscureText = value;
    notifyListeners();
  }

  void setIsObscureConfirmationText(bool value) {
    _isObscureConfrimationText = value;
    notifyListeners();
  }

  void setLoading(bool value) {
    _isLoading = value;
    notifyListeners();
  }

  Future<bool> signIn(
    String email,
    String password,
  ) async {
    try {
      setLoading(true);

      final data = await _authenticationService.signIn(
        email,
        password,
        isRemember: _isRemember,
      );

      _authenticationModel = data;

      setLoading(false);

      if (_authenticationModel?.metadata?.code == 200) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Sign In Provider: $e");
      // _authenticationModel = AuthenticationModel(
      //   code: 500,
      //   status: "Error",
      //   message: "$e",
      //   data: null,
      // );
      throw AppException("Gagal masuk. Coba lagi nanti.");
    }
  }

  Future<bool> signUp(
    String nim,
    String name,
    String email,
    String password,
  ) async {
    try {
      setLoading(true);

      final data = await _authenticationService.signUp(
        nim,
        name,
        email,
        password,
      );

      _authenticationModel = data;

      setLoading(false);

      if (_authenticationModel?.metadata?.code == 200) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("Error Sign Up Provider: $e");
      // _authenticationModel = AuthenticationModel(
      //   code: 500,
      //   status: "Error",
      //   message: "$e",
      //   data: null,
      // );
      throw AppException("Gagal daftar. Coba lagi nanti.");
    }
  }

  Future<bool> requestOtp(String email) async {
    try {
      setLoading(true);

      var data = await _authenticationService.requestOtp(email);

      setLoading(false);

      return data;
    } catch (e) {
      setLoading(false);
      log("Error Request OTP Provider: $e");
      // _authenticationModel = AuthenticationModel(
      //   code: 500,
      //   status: "Error",
      //   message: "$e",
      //   data: null,
      // );
      throw AppException("Gagal mengirim otp. Coba lagi nanti.");
    }
  }

  Future<bool> changePassword(
    String email,
    String otp,
    String newPassword,
    String confirmNewPassword,
  ) async {
    try {
      setLoading(true);

      var data = await _authenticationService.changePassword(
        email,
        otp,
        newPassword,
        confirmNewPassword,
      );

      setLoading(false);

      return data;
    } catch (e) {
      setLoading(false);
      log("Error Change Password Provider: $e");
      // _authenticationModel = AuthenticationModel(
      //   code: 500,
      //   status: "Error",
      //   message: "$e",
      //   data: null,
      // );
      throw AppException("Gagal mengubah kata sandi. Coba lagi nanti.");
    }
  }
}
