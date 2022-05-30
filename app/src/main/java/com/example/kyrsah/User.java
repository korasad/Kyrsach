package com.example.kyrsah;

public class User {
    public String id, inf1;
    int inf;
    public double cold, hot, elc;

    public User() {
    }

    public User(String id, String inf1, double cold, double hot, double elc, int inf) {
        this.id = id;
        this.cold = cold;
        this.hot = hot;
        this.elc = elc;
        this.inf = inf;
        this.inf1 = inf1;
    }
}
