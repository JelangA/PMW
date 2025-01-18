import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';

class CustomButtonWidget extends StatelessWidget {
  const CustomButtonWidget({
    super.key,
    required this.text,
    required this.onPressed,
    required this.color,
    required this.height,
    required this.width,
  });

  final String text;
  final Function() onPressed;
  final Color color;
  final double height, width;

  @override
  Widget build(BuildContext context) {
    return ElevatedButton(
      style: ElevatedButton.styleFrom(
        shape: RoundedRectangleBorder(
          borderRadius: BorderRadius.circular(10),
        ),
        backgroundColor: color,
        fixedSize: Size(
          width,
          height,
        ),
      ),
      onPressed: onPressed,
      child: Text(
        text,
        style: secondaryTextStyle,
        textAlign: TextAlign.center,
      ),
    );
  }
}
