import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/validate_otp_page.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
import 'package:page_transition/page_transition.dart';
import 'package:provider/provider.dart';

class RequestOtpMobilePage extends StatefulWidget {
  const RequestOtpMobilePage({super.key});

  @override
  State<RequestOtpMobilePage> createState() => _RequestOtpMobilePageState();
}

class _RequestOtpMobilePageState extends State<RequestOtpMobilePage> {
  TextEditingController emailController = TextEditingController();

  void navigate(String email) {
    Navigator.of(context).push(
      PageTransition(
        type: PageTransitionType.rightToLeft,
        child: ValidateOtpPage(email: email),
      ),
    );
  }

  void guardedSnackbar(String message, Color color) {
    showSnackBar(
      context,
      message,
      color,
    );
  }

  void requestOtp(
      AuthenticationProvider authenticationProvider, String email) async {
    if (email.isNotEmpty) {
      try {
        if (await authenticationProvider.requestOtp(email)) {
          guardedSnackbar(
            "Kode OTP telah dikirim.",
            Colors.green,
          );

          await Future.delayed(const Duration(seconds: 2));

          navigate(email);
        } else {
          guardedSnackbar(
            "${authenticationProvider.authenticationModel?.metadata?.message}.",
            Colors.red,
          );
        }
      } catch (e) {
        guardedSnackbar(
          "Terjadi kesalahan. ${authenticationProvider.authenticationModel?.metadata?.message}.",
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
              "assets/png/pmw_poster.png",
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
                              requestOtp(
                                authenticationProvider,
                                emailController.text,
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
