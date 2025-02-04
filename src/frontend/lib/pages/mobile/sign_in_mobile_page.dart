import 'package:flutter/material.dart';
import 'package:frontend/pages/attend_page.dart';
import 'package:frontend/pages/request_otp_page.dart';
import 'package:frontend/widgets/alert_dialog_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
import 'package:page_transition/page_transition.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_up_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/remember_me_check_box_widget.dart';
import 'package:provider/provider.dart';

class SignInMobilePage extends StatefulWidget {
  const SignInMobilePage({super.key});

  @override
  State<SignInMobilePage> createState() => _SignInMobilePageState();
}

class _SignInMobilePageState extends State<SignInMobilePage> {
  TextEditingController emailController = TextEditingController();
  TextEditingController passwordController = TextEditingController();

  navigate() {
    Navigator.pushAndRemoveUntil(
      context,
      PageTransition(
        child: const AttendPage(),
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

  void guardedDialog(
    String message,
    bool isSuccess, {
    Function()? onPressed,
  }) {
    showDialogWidget(
      context,
      message,
      true,
      onPressed: onPressed,
    );
  }

  void signIn(
    AuthenticationProvider authenticationProvider,
    String email,
    String password,
  ) async {
    if (email.isNotEmpty && password.isNotEmpty) {
      try {
        if (await authenticationProvider.signIn(email, password)) {
          guardedDialog(
            "Kamu berhasil masuk!",
            true,
            onPressed: () {
              Navigator.of(context).pushAndRemoveUntil(
                PageTransition(
                  type: PageTransitionType.rightToLeft,
                  child: const AttendPage(),
                ),
                (Route<dynamic> route) => false,
              );
            },
          );
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
                        "Masuk di sini",
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
                        builder: (context, authProvider, child) {
                          return CustomTextFormFieldWidget(
                            label: "Kata sandi",
                            hintText: "********",
                            isPasswordField: true,
                            isObscureText: authProvider.isObscureText,
                            controller: passwordController,
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
                      const RememberMeCheckBoxWidget(),
                      SizedBox(
                        height: height(context) * 0.1,
                      ),
                      Consumer<AuthenticationProvider>(
                        builder: (context, authenticationProvider, child) {
                          return AuthButtonWidget(
                            text: "Masuk sekarang!",
                            isLoading: authenticationProvider.isLoading,
                            onPressed: () {
                              signIn(
                                authenticationProvider,
                                emailController.text,
                                passwordController.text,
                              );
                            },
                          );
                        },
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          GestureDetector(
                            onTap: () {
                              Navigator.of(context).push(
                                PageTransition(
                                  type: PageTransitionType.rightToLeft,
                                  child: const RequestOtpPage(),
                                ),
                              );
                            },
                            child: Text(
                              "Lupa kata sandi?",
                              style: primaryTextStyle.copyWith(
                                fontWeight: bold,
                              ),
                            ),
                          ),
                          GestureDetector(
                            onTap: () {
                              Navigator.of(context).pushAndRemoveUntil(
                                PageTransition(
                                  type: PageTransitionType.rightToLeft,
                                  child: const SignUpPage(),
                                ),
                                (Route<dynamic> route) => false,
                              );
                            },
                            child: Text(
                              "Belum punya akun?",
                              style: primaryTextStyle.copyWith(
                                fontWeight: bold,
                                color: primaryColor,
                              ),
                            ),
                          ),
                        ],
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
