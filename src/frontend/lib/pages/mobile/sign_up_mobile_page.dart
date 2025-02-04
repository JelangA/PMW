import 'package:flutter/material.dart';
import 'package:frontend/widgets/alert_dialog_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
import 'package:page_transition/page_transition.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_in_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class SignUpMobilePage extends StatefulWidget {
  const SignUpMobilePage({super.key});

  @override
  State<SignUpMobilePage> createState() => _SignUpMobilePageState();
}

class _SignUpMobilePageState extends State<SignUpMobilePage> {
  TextEditingController nameController = TextEditingController();
  TextEditingController nimController = TextEditingController();
  TextEditingController emailController = TextEditingController();
  TextEditingController passwordController = TextEditingController();

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

  void signUp(
    AuthenticationProvider authenticationProvider,
    String nim,
    String name,
    String email,
    String password,
  ) async {
    if (nim.isNotEmpty &&
        name.isNotEmpty &&
        email.isNotEmpty &&
        password.isNotEmpty) {
      try {
        if (await authenticationProvider.signUp(
          nim,
          name,
          email,
          password,
        )) {
          guardedDialog(
            "Kamu berhasil daftar!",
            true,
            onPressed: () {
              Navigator.of(context).pushAndRemoveUntil(
                PageTransition(
                  type: PageTransitionType.rightToLeft,
                  child: const SignInPage(),
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
                  // height: height(context) * 0.6,
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
                        label: "Nama lengkap",
                        hintText: "John Doe",
                        controller: nameController,
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomTextFormFieldWidget(
                        label: "NIM",
                        hintText: "231524008",
                        controller: nimController,
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
                        height: height(context) * 0.1,
                      ),
                      Consumer<AuthenticationProvider>(
                        builder: (context, authenticationProvider, child) {
                          return AuthButtonWidget(
                            text: "Daftar sekarang!",
                            isLoading: authenticationProvider.isLoading,
                            onPressed: () {
                              signUp(
                                authenticationProvider,
                                nimController.text,
                                nameController.text,
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
                        mainAxisAlignment: MainAxisAlignment.end,
                        children: [
                          GestureDetector(
                            onTap: () {
                              Navigator.of(context).pushAndRemoveUntil(
                                PageTransition(
                                  type: PageTransitionType.rightToLeft,
                                  child: const SignInPage(),
                                ),
                                (Route<dynamic> route) => false,
                              );
                            },
                            child: Text(
                              "Sudah punya akun?",
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
