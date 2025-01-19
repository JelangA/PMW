import 'dart:developer';

import 'package:flutter/material.dart';
import 'package:frontend/models/authentication_model.dart';
import 'package:frontend/services/authentication_service.dart';

class AuthenticationProvider with ChangeNotifier {
  final _authenticationService = AuthenticationService();
  AuthenticationModel? _authenticationModel;
  AuthenticationModel? get authenticationModel => _authenticationModel;
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

      if (_authenticationModel != null) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("$e");
      throw Exception();
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

      if (_authenticationModel != null) {
        return true;
      } else {
        return false;
      }
    } catch (e) {
      setLoading(false);
      log("$e");
      throw Exception();
    }
  }
}
