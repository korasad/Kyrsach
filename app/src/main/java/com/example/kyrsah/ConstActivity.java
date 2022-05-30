package com.example.kyrsah;

import android.os.Bundle;
import android.os.PersistableBundle;
import android.view.View;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class ConstActivity extends AppCompatActivity {
    private EditText etHome, etTel, etInter, etCenaCoWa, etCenaHoWa, etCenaEla;
    private DatabaseReference mDataBase;
    private String USER_KEY_CONST = "User";

    @Override
    public void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.const_activity);
        init();
    }

    private void init() {
        etHome = findViewById(R.id.etHome);
        etTel = findViewById(R.id.etTel);
        etInter = findViewById(R.id.etInter);
        etCenaCoWa = findViewById(R.id.etCenaCoWa);
        etCenaHoWa = findViewById(R.id.etCenaHoWa);
        etCenaEla = findViewById(R.id.etCenaEla);
        mDataBase = FirebaseDatabase.getInstance().getReference(USER_KEY_CONST);
    }
    public void onClickConstSave(View view)
    {
        String id = mDataBase.getKey();
        String Constant = "const";
        String Cena = "Cena";
        double Home = Double.parseDouble(etHome.getText().toString());
        double Tel = Double.parseDouble(etTel.getText().toString());
        double Inter = Double.parseDouble(etInter.getText().toString());
        double CenaW1 = Double.parseDouble(etCenaCoWa.getText().toString());
        double CenaW2 = Double.parseDouble(etCenaHoWa.getText().toString());
        double CenaW3 = Double.parseDouble(etCenaEla.getText().toString());
        Consti newConsti = new Consti(id, Constant, Tel, Inter, Home);
        Ceni newCeni = new Ceni(id, Cena, CenaW1, CenaW2, CenaW3);
        mDataBase.push().setValue(newConsti);
        mDataBase.push().setValue(newCeni);
        Toast.makeText(this, "Сохранено!", Toast.LENGTH_SHORT).show();
    }
}
