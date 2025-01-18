import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';

class AuthButtonWidget extends StatelessWidget {
  const AuthButtonWidget({
    super.key,
    required this.text,
    required this.onPressed,
    this.isLoading = false,
  });

  final String text;
  final Function() onPressed;
  final bool isLoading;

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
      child: isLoading
          ? Center(
              child: CircularProgressIndicator(
                color: white,
                strokeWidth: 2,
              ),
            )
          : Text(
              text,
              style: secondaryTextStyle,
            ),
    );
  }
}
