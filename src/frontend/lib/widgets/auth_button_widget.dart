import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';

class AuthButtonWidget extends StatelessWidget {
  const AuthButtonWidget({
    super.key,
    required this.text,
    required this.onPressed,
  });

  final String text;
  final Function() onPressed;

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      style: ElevatedButton.styleFrom(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(0),
        ),
        backgroundColor: primaryColor,
        fixedSize: const Size(
          double.maxFinite,
          60,
        ),
      ),
      onPressed: onPressed,
      child: Text(
        text, 
        style: secondaryTextStyle,
      ),
    );
  }
}
