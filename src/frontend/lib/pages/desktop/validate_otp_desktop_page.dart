import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class ValidateOtpDesktopPage extends StatefulWidget {
  const ValidateOtpDesktopPage({super.key});

  @override
  State<ValidateOtpDesktopPage> createState() => _ValidateOtpDesktopPageState();
}

class _ValidateOtpDesktopPageState extends State<ValidateOtpDesktopPage> {
  TextEditingController otpController = TextEditingController();
  TextEditingController newPasswordController = TextEditingController();
  TextEditingController confirmNewPasswordController = TextEditingController();

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
                    "Ubah Kata Sandi",
                    style: primaryTextStyle.copyWith(
                      fontWeight: bold,
                      fontSize: 20,
                    ),
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  CustomTextFormFieldWidget(
                    label: "Kode OTP",
                    hintText: "000000",
                    controller: otpController,
                    inputType: TextInputType.number,
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<AuthenticationProvider>(
                    builder: (context, authProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "Kata sandi baru",
                        hintText: "********",
                        isPasswordField: true,
                        isObscureText: authProvider.isObscureText,
                        controller: newPasswordController,
                        setObscureText: () {
                          authProvider
                              .setIsObscureText(!authProvider.isObscureText);
                        },
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<AuthenticationProvider>(
                    builder: (context, authProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "Konfirmasi kata sandi baru",
                        hintText: "********",
                        isPasswordField: true,
                        isObscureText: authProvider.isObscureConfrimationText,
                        controller: confirmNewPasswordController,
                        setObscureText: () {
                          authProvider.setIsObscureConfirmationText(
                              !authProvider.isObscureConfrimationText);
                        },
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<AuthenticationProvider>(
                    builder: (context, authenticationProvider, child) {
                      return AuthButtonWidget(
                        text: "Konfirmasi Sekarang!",
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
