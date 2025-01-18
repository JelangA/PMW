import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/user_provider.dart';
import 'package:frontend/providers/workshop_provider.dart';
import 'package:frontend/widgets/custom_button_widget.dart';
import 'package:frontend/widgets/custom_dropdown_button_form_field_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class AttendMobilePage extends StatefulWidget {
  const AttendMobilePage({super.key});

  @override
  State<AttendMobilePage> createState() => _AttendMobilePageState();
}

class _AttendMobilePageState extends State<AttendMobilePage> {
  TextEditingController nameController = TextEditingController();
  TextEditingController nimController = TextEditingController();
  TextEditingController departmentProgramStudyController =
      TextEditingController();
  TextEditingController emailController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    WidgetsBinding.instance.addPostFrameCallback((timestamp) {
      Provider.of<UserProvider>(
        context,
        listen: false,
      ).getProfileUser();
      Provider.of<WorkshopProvider>(
        context,
        listen: false,
      ).getAllWorkshop();
    });

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
                  child: SingleChildScrollView(
                    physics: const BouncingScrollPhysics(),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        SizedBox(
                          height: height(context) * 0.1,
                        ),
                        Center(
                          child: Text(
                            "Rekaman Data",
                            style: primaryTextStyle.copyWith(
                              fontWeight: bold,
                              fontSize: 20,
                            ),
                          ),
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer<UserProvider>(
                          builder: (context, userProvider, child) {
                            return CustomTextFormFieldWidget(
                              label: "NIM",
                              hintText: userProvider.userModel?.nim ?? "",
                              controller: nimController,
                              isEnabled: false,
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer<UserProvider>(
                          builder: (context, userProvider, child) {
                            return CustomTextFormFieldWidget(
                              label: "Nama lengkap",
                              hintText: userProvider.userModel?.name ?? "",
                              controller: nameController,
                              isEnabled: false,
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer<UserProvider>(
                          builder: (context, userProvider, child) {
                            return CustomTextFormFieldWidget(
                              label: "Jurusan - Prodi",
                              hintText:
                                  "${userProvider.userModel?.major ?? ""} - ${userProvider.userModel?.programStudy ?? ""}",
                              controller: departmentProgramStudyController,
                              isEnabled: false,
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer<UserProvider>(
                          builder: (context, userProvider, child) {
                            return CustomTextFormFieldWidget(
                              label: "Alamat email",
                              hintText: userProvider.userModel?.email ?? "",
                              controller: emailController,
                              isEnabled: false,
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer<WorkshopProvider>(
                          builder: (context, workshopProvider, child) {
                            return CustomDropdownButtonFormFieldWidget(
                              hintText: "Pilih Workshop",
                              items:
                                  workshopProvider.workshopModel,
                              onChanged: (value) {},
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        CustomButtonWidget(
                          text:
                              "Kamu telah presensi awal pada\n22 Nov 2024 10:17:43",
                          onPressed: () {},
                          color: greenColor,
                          height: 70,
                          width: double.maxFinite,
                        ),
                      ],
                    ),
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
