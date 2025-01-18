import 'package:flutter/material.dart';
import 'package:page_transition/page_transition.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/sign_up_page.dart';
import 'package:frontend/providers/auth_provider.dart';
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
                      Consumer<AuthProvider>(
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
                      AuthButtonWidget(
                        text: "Masuk sekarang!",
                        onPressed: () {},
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      Row(
                        mainAxisAlignment: MainAxisAlignment.spaceBetween,
                        children: [
                          Text(
                            "Lupa kata sandi?",
                            style: primaryTextStyle.copyWith(
                              fontWeight: bold,
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
