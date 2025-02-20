import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_in_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
import 'package:page_transition/page_transition.dart';
import 'package:provider/provider.dart';

class ValidateOtpDesktopPage extends StatefulWidget {
  const ValidateOtpDesktopPage({
    super.key,
    required this.email,
  });

  final String email;

  @override
  State<ValidateOtpDesktopPage> createState() => _ValidateOtpDesktopPageState();
}

class _ValidateOtpDesktopPageState extends State<ValidateOtpDesktopPage> {
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
        try {
          if (await authenticationProvider.changePassword(
              email, otp, newPassword, confirmNewPassword)) {
            guardedSnackbar(
              "Kata sandi berhasil diubah.",
              Colors.green,
            );

            await Future.delayed(const Duration(seconds: 2));

            navigate();
          } else {
            guardedSnackbar(
              "${authenticationProvider.authenticationModel?.metadata?.message}.",
              Colors.red,
            );
          }
        } catch (e) {
          guardedSnackbar(
            "Terjadi kesalahan: ${authenticationProvider.authenticationModel?.metadata?.message}.",
            Colors.red,
          );
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
      body: Row(
        children: [
          Expanded(
            flex: 5,
            child: Image.asset(
              "assets/png/pmw_poster.png",
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
          ),
        ],
      ),
    );
  }
}
