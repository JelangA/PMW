import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/widgets/custom_button_widget.dart';

showDialogWidget(
  BuildContext context,
  bool isSuccess, {
  Function()? onPressed,
}) {
  return showDialog(
    context: context,
    builder: (context) {
      return AlertDialog(
        backgroundColor: white,
        icon: Image.asset(
          "assets/png/${isSuccess ? 'success' : 'failed'}.png",
          filterQuality: FilterQuality.high,
        ),
        title: Text(
          isSuccess ? "Selamat!" : "Waduh!",
          style: primaryTextStyle.copyWith(
            fontWeight: bold,
            fontSize: 20,
          ),
        ),
        content: Text(
          isSuccess
              ? "Kamu berhasil presensi."
              : "Periksa koneksi internet kamu ya.",
          style: primaryTextStyle.copyWith(
            fontWeight: bold,
            fontSize: 16,
          ),
          textAlign: TextAlign.center,
        ),
        actionsAlignment: MainAxisAlignment.center,
        actions: [
          CustomButtonWidget(
            text: isSuccess ? "Lanjut" : "Coba lagi",
            onPressed: onPressed ??
                () {
                  Navigator.of(context).pop();
                },
            color: isSuccess ? successColor : failedColor,
            height: 50,
            width: 300,
          ),
        ],
      );
    },
  );
}
