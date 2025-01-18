import 'package:flutter/material.dart';

class AuthenticationProvider with ChangeNotifier {
  bool _isRemember = false;
  bool get isRemember => _isRemember;
  bool _isObscureText = true;
  bool get isObscureText => _isObscureText;

  void setIsRemember(bool value) {
    _isRemember = value;
    notifyListeners();
  }

  void setIsObscureText(bool value) {
    _isObscureText = value;
    notifyListeners();
  }
}
