import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/attendance_provider.dart';
import 'package:frontend/providers/user_provider.dart';
import 'package:frontend/providers/workshop_provider.dart';
import 'package:frontend/widgets/custom_button_widget.dart';
import 'package:frontend/widgets/custom_dropdown_button_form_field_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
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

  void guardedSnackbar(String message, Color color) {
    showSnackBar(
      context,
      message,
      color,
    );
  }

  void checkIn(
    AttendanceProvider attendanceProvider,
    String workshopId,
    String nim,
  ) async {
    if (workshopId.isNotEmpty) {
      try {
        if (await attendanceProvider.checkIn(nim)) {
          guardedSnackbar(
            "Berhasil presensi awal.",
            Colors.green,
          );
        } else {
          guardedSnackbar(
            "${attendanceProvider.attendanceModel?.metadata?.message}",
            Colors.red,
          );
        }
      } catch (e) {
        guardedSnackbar(
          "Terjadi kesalahan: $e",
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

  void checkOut(
    AttendanceProvider attendanceProvider,
    String workshopId,
    String nim,
  ) async {
    if (workshopId.isNotEmpty) {
      try {
        if (await attendanceProvider.checkOut(nim)) {
          guardedSnackbar(
            "Berhasil presensi akhir.",
            Colors.green,
          );
        } else {
          guardedSnackbar(
            "${attendanceProvider.attendanceModel?.metadata?..message}.",
            Colors.red,
          );
        }
      } catch (e) {
        guardedSnackbar(
          "Terjadi kesalahan: $e",
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
                              hintText: userProvider.userModel?.data?.nim ?? "",
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
                              hintText: userProvider.userModel?.data?.name ?? "",
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
                                  "${userProvider.userModel?.data?.major ?? ""} - ${userProvider.userModel?.data?.programStudy ?? ""}",
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
                              hintText: userProvider.userModel?.data?.email ?? "",
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
                              items: workshopProvider.workshopModel?.data ?? [],
                              onChanged: (value) {},
                            );
                          },
                        ),
                        SizedBox(
                          height: defaultPadding,
                        ),
                        Consumer2<AttendanceProvider, UserProvider>(
                          builder: (context, attendanceProvider, userProvider,
                              child) {
                            final attendance =
                                attendanceProvider.attendanceModel;

                            if (attendance?.data?.checkInTime != null &&
                                attendance?.data?.checkOutTime != null) {
                              return CustomButtonWidget(
                                text:
                                    "Kamu telah presensi awal pada ${attendance!.data?.checkInTime}\ndan presensi akhir pada ${attendance.data?.checkOutTime}",
                                onPressed: () {},
                                color: greenColor,
                                height: 70,
                                width: double.maxFinite,
                                isLoading: attendanceProvider.isLoading,
                              );
                            } else if (attendance?.data?.checkInTime == null) {
                              return CustomButtonWidget(
                                text: "Presensi Awal Sekarang!",
                                onPressed: () {
                                  checkIn(
                                    attendanceProvider,
                                    attendanceProvider.workshopId!,
                                    userProvider.userModel!.data!.nim.toString(),
                                  );
                                },
                                color: primaryColor,
                                height: 70,
                                width: double.maxFinite,
                                isLoading: attendanceProvider.isLoading,
                              );
                            } else {
                              return CustomButtonWidget(
                                text: "Presensi Akhir Sekarang!",
                                onPressed: () {
                                  checkOut(
                                    attendanceProvider,
                                    attendanceProvider.workshopId!,
                                    userProvider.userModel!.data!.nim.toString(),
                                  );
                                },
                                color: primaryColor,
                                height: 70,
                                width: double.maxFinite,
                                isLoading: attendanceProvider.isLoading,
                              );
                            }
                          },
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
