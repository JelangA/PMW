import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:provider/provider.dart';

class RememberMeCheckBoxWidget extends StatelessWidget {
  const RememberMeCheckBoxWidget({super.key});

  @override
  Widget build(BuildContext context) {
    return Row(
      children: [
        Consumer<AuthenticationProvider>(
          builder: (context, authProvider, child) {
            return Checkbox(
              semanticLabel: "Ingat saya",
              splashRadius: 20,
              fillColor: WidgetStatePropertyAll(
                  authProvider.isRemember ? primaryColor : white),
              value: authProvider.isRemember,
              shape: RoundedRectangleBorder(
                side: BorderSide(color: grey400),
                borderRadius: BorderRadius.circular(5),
              ),
              onChanged: (value) {
                authProvider.setIsRemember(value!);
              },
            );
          },
        ),
        Text(
          "Ingat saya",
          style: primaryTextStyle,
        ),
      ],
    );
  }
}
