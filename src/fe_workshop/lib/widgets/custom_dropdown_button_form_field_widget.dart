import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/models/workshop_model.dart';

class CustomDropdownButtonFormFieldWidget extends StatelessWidget {
  const CustomDropdownButtonFormFieldWidget({
    super.key,
    required this.hintText,
    required this.items,
    required this.onChanged,
  });

  final String hintText;
  final List<WorkshopModel> items;
  final Function(String? value)? onChanged;

  @override
  Widget build(BuildContext context) {
    return DropdownButtonFormField(
      style: primaryTextStyle,
      decoration: InputDecoration(
        hintText: hintText,
        hintStyle: primaryTextStyle.copyWith(
          color: grey400,
        ),
      ),
      hint: Align(
        alignment: Alignment.centerLeft,
        child: Text(
          hintText,
          style: primaryTextStyle.copyWith(
            fontWeight: bold,
            color: grey400,
          ),
        ),
      ),
      items: items.map<DropdownMenuItem<String>>(
        (value) {
          return DropdownMenuItem(
            value: value.title,
            child: Text(
              value.title.toString(),
              style: primaryTextStyle,
            ),
          );
        },
      ).toList(),
      onChanged: onChanged,
    );
  }
}
