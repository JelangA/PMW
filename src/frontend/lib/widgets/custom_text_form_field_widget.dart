import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';

class CustomTextFormFieldWidget extends StatelessWidget {
  const CustomTextFormFieldWidget({
    super.key,
    required this.label,
    required this.hintText,
    required this.controller,
    this.isPasswordField = false,
    this.isObscureText = false,
    this.isEnabled = true,
    this.setObscureText,
  });

  final String label, hintText;
  final TextEditingController controller;
  final bool isPasswordField, isObscureText, isEnabled;
  final Function()? setObscureText;

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Text(
          label,
          style: primaryTextStyle.copyWith(
            fontWeight: bold,
          ),
        ),
        TextFormField(
          controller: controller,
          enabled: isEnabled,
          style: primaryTextStyle,
          obscureText: isObscureText,
          obscuringCharacter: '*',
          decoration: InputDecoration(
            hintText: hintText,
            hintStyle: primaryTextStyle.copyWith(
              color: grey400,
            ),
            suffixIcon: isPasswordField
                ? GestureDetector(
                    onTap: setObscureText,
                    child: Icon(
                      isObscureText ? Icons.visibility_off : Icons.visibility,
                      color: isObscureText ? grey400 : primaryColor,
                    ),
                  )
                : null,
          ),
        ),
      ],
    );
  }
}
