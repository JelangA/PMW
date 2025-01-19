import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/authentication_provider.dart';
import 'package:frontend/widgets/auth_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class ValidateOtpMobilePage extends StatefulWidget {
  const ValidateOtpMobilePage({super.key});

  @override
  State<ValidateOtpMobilePage> createState() => _ValidateOtpMobilePageState();
}

class _ValidateOtpMobilePageState extends State<ValidateOtpMobilePage> {
  TextEditingController otpController = TextEditingController();
  TextEditingController newPasswordController = TextEditingController();
  TextEditingController confirmNewPasswordController = TextEditingController();

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
                            text: "Konfirmasi Sekarang!",
                            isLoading: authenticationProvider.isLoading,
                            onPressed: () {
                              // signIn(
                              //   authenticationProvider,
                              //   emailController.text,
                              //   passwordController.text,
                              // );
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
