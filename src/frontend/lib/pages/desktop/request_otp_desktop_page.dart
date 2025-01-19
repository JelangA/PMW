import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class RequestOtpDesktopPage extends StatefulWidget {
  const RequestOtpDesktopPage({super.key});

  @override
  State<RequestOtpDesktopPage> createState() => _RequestOtpDesktopPageState();
}

class _RequestOtpDesktopPageState extends State<RequestOtpDesktopPage> {
  TextEditingController emailController = TextEditingController();
  
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: white,
      body: Row(
        children: [
          Expanded(
            flex: 5,
            child: Image.asset(
              "assets/png/pmw-poster.png",
              fit: BoxFit.cover,
            ),
          ),
          Expanded(
            flex: 5,
            child: Container(
              padding: const EdgeInsets.all(100),
              decoration: BoxDecoration(
                color: white,
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  SizedBox(
                    height: height(context) * 0.1,
                  ),
                  Text(
                    "Lupa Kata Sandi",
                    style: primaryTextStyle.copyWith(
                      fontWeight: bold,
                      fontSize: 20,
                    ),
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  CustomTextFormFieldWidget(
                    label: "Alamat email",
                    hintText: "user@example.com",
                    controller: emailController,
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<AuthenticationProvider>(
                    builder: (context, authenticationProvider, child) {
                      return AuthButtonWidget(
                        text: "Kirim Kode OTP!",
                        isLoading: authenticationProvider.isLoading,
                        onPressed: () {
                          // signIn(
                          //   authenticationProvider,
                          //   emailController.text,
                          // );
                        },
                      );
                    },
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}