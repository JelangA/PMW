import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
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
    this.inputType = TextInputType.text,
  });

  final String label, hintText;
  final TextEditingController controller;
  final bool isPasswordField, isObscureText, isEnabled;
  final Function()? setObscureText;
  final TextInputType inputType;

  String? _validateNumberInput(String? value) {
    if (inputType == TextInputType.number &&
        value != null &&
        value.isNotEmpty) {
      final isNumber = double.tryParse(value) != null;
      if (!isNumber) {
        WidgetsBinding.instance.addPostFrameCallback((_) {
          controller.text = controller.text.replaceAll(RegExp(r'[^0-9]'), '');
          controller.selection = TextSelection.fromPosition(
            TextPosition(offset: controller.text.length),
          );
        });
        return 'Hanya angka yang diperbolehkan';
      }
    }
    return null;
  }

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
          keyboardType: inputType,
          enabled: isEnabled,
          style: primaryTextStyle,
          obscureText: isObscureText,
          obscuringCharacter: '*',
          inputFormatters: inputType == TextInputType.number
              ? [
                  FilteringTextInputFormatter.allow(RegExp(r'[0-9]')),
                ]
              : null,
          validator: _validateNumberInput,
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
