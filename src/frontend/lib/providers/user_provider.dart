import 'dart:developer';
import 'package:flutter/material.dart';
import 'package:frontend/models/user_model.dart';
import 'package:frontend/services/user_service.dart';

class UserProvider with ChangeNotifier {
  final _userService = UserService();
  UserModel? _userModel;
  UserModel? get userModel => _userModel;
  bool _isLoading = false;
  bool get isLoading => _isLoading;

  void setLoading(bool value) {
    _isLoading = value;
    notifyListeners();
  }

  Future<bool> getProfileUser() async {
    try {
      setLoading(true);

      final data = await _userService.getProfileUser();

      _userModel = data;

      setLoading(false);

      if (_userModel != null) {
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
