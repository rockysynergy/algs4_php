import edu.princeton.cs.algs4.StdRandom;
import edu.princeton.cs.algs4.StdOut;

public class RandomTest {
    public static void main(String args[]) {
        int N = Integer.parseInt(args[0]);

        for (int i = 0; i < N; i++) {
            StdOut.println(StdRandom.uniform(-1000000, 1000000));
        }
    }
}
