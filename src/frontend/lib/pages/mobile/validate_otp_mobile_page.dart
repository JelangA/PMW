import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_in_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
import 'package:page_transition/page_transition.dart';
import 'package:provider/provider.dart';

class ValidateOtpMobilePage extends StatefulWidget {
  const ValidateOtpMobilePage({super.key,
    required this.email,
  });

  final String email;

  @override
  State<ValidateOtpMobilePage> createState() => _ValidateOtpMobilePageState();
}

class _ValidateOtpMobilePageState extends State<ValidateOtpMobilePage> {
  TextEditingController otpController = TextEditingController();
  TextEditingController newPasswordController = TextEditingController();
  TextEditingController confirmNewPasswordController = TextEditingController();

  void navigate() {
    Navigator.pushAndRemoveUntil(
      context,
      PageTransition(
        child: const SignInPage(),
        type: PageTransitionType.rightToLeft,
      ),
      (Route<dynamic> route) => false,
    );
  }

  void guardedSnackbar(String message, Color color) {
    showSnackBar(
      context,
      message,
      color,
    );
  }

  changePassword(
    AuthenticationProvider authenticationProvider,
    String email,
    String otp,
    String newPassword,
    String confirmNewPassword,
  ) async {
    if (email.isNotEmpty &&
        otp.isNotEmpty &&
        newPassword.isNotEmpty &&
        confirmNewPassword.isNotEmpty) {
      if (newPassword == confirmNewPassword) {
        if (await authenticationProvider.changePassword(
            email, otp, newPassword, confirmNewPassword)) {
          guardedSnackbar(
            "Kata sandi berhasil diubah.",
            Colors.green,
          );

          await Future.delayed(const Duration(seconds: 2));

          navigate();
        }
      } else {
        guardedSnackbar(
          "Kata sandi tidak sama.",
          Colors.red,
        );
      }
    } else {
      guardedSnackbar(
        "Isi semua data.",
        Colors.red,
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: white,
      body: Stack(
        children: [
          SizedBox(
            height: height(context),
            width: width(context),
            child: Image.asset(
              "assets/png/pmw-poster.png",
              fit: BoxFit.cover,
            ),
          ),
          Align(
            alignment: Alignment.center,
            child: Wrap(
              children: [
                Container(
                  padding: EdgeInsets.all(defaultPadding),
                  width: height(context) * 0.5,
                  decoration: BoxDecoration(
                    color: white,
                    borderRadius: BorderRadius.circular(defaultBorderRadius),
                  ),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
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
                              authProvider.setIsObscureText(
                                  !authProvider.isObscureText);
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
                            isObscureText:
                                authProvider.isObscureConfrimationText,
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
                            text: "Ubah Kata Sandi!",
                            isLoading: authenticationProvider.isLoading,
                            onPressed: () {
                              changePassword(
                                authenticationProvider,
                                widget.email,
                                otpController.text,
                                newPasswordController.text,
                                confirmNewPasswordController.text,
                              );
                            },
                          );
                        },
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
